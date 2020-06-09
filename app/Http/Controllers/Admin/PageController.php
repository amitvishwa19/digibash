<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
       
            $pages = Page::orderby('created_at','desc')->get();
            return Datatables::of($pages)
            ->editColumn('created_at',function(Page $page){
                return $page->created_at->diffForHumans();
            })
            ->addColumn('author',function($page){
                return $page->author->name;
            })
            ->addColumn('status',function($post){
                if($post->status == 'published'){
                    return '<div class="badge badge-success">Published</div>';
                }else{
                    return '<div class="badge badge-warning">Draft</div>';
                }
            })  
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('page.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('page.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);
        }

        return view('admin.pages.page.page');

        //return response()->json($pages);
    }

    public function create()
    {
        return view('admin.pages.page.page_add');
    }

    public function store(Request $request)
    {   
        
        $validate = $request->validate([
            'page_title' => 'required'
        ]);

        $page = New Page;
        $page->user_id = Auth::user()->id;
        $page->title = $request->page_title;
        $page->slug = Str::slug($request->page_title,'-');
        $page->body = $request->body;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;

        if($request->page_status == 'on'){
            $page->status = 'published';
        }else{
            $page->status = 'draft';
        }

        $page->save();
        
        return redirect()->route('page.index')
        ->with([
            'message'    =>'Page Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.page.page_view',compact('page'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.page.page_edit',compact('page'));
    }

    public function update(PageRequest $request, $id)
    {
        $validate = $request->validate([
            'page_title' => 'required'
        ]);

        $page = Page::findOrFail($id);
        $page->user_id = Auth::user()->id;
        $page->title = $request->page_title;
        $page->slug = Str::slug($request->page_title,'-');
        $page->body = $request->body;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;

        if($request->page_status == 'on'){
            $page->status = 'published';
        }else{
            $page->status = 'draft';
        }

        $page->save();
        
        return redirect()->route('page.index')
        ->with([
            'message'    =>'Page Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        Page::destroy($id);

        return response()->json(null, 204);
    }
}