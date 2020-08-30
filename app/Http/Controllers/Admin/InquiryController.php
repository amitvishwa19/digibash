<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InquiryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $inquiries = Inquiry::orderby('created_at','desc')->get();

            return Datatables::of($inquiries)
            ->editColumn('created_at',function(Inquiry $inquiry){
                    return $inquiry->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('inquiry.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('inquiry.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }
        

        return view('admin.pages.inquiry.inquiry');

    }

    public function create()
    {
        return view('admin.pages.inquiry.inquiry_add');
    }

    public function store(InquiryRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $inquiry = New Inquiry;
        $inquiry->name = $request->name;
        $inquiry->save();

        return redirect()->route('inquiry.index')
        ->with([
            'message'    =>'Inquiry Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        return response()->json($inquiry);
    }

    public function edit($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        //return response()->json($inquiry);

        return view('admin.pages.inquiry.inquiry_edit',compact('inquiry'));
    }

    public function update(InquiryRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $inquiry = Inquiry::findOrFail($id);
        $inquiry->name = $request->name;
        $inquiry->save();

        return redirect()->route('inquiry.index')
        ->with([
            'message'    =>'Inquiry Updated Successfully',
            'alert-type' => 'success',
        ]);

        
    }

    public function destroy($id)
    {
        Inquiry::destroy($id);

        return response()->json(null, 204);
    }
}