<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\ShopRequest;
use App\Http\Controllers\Controller;
use App\Events\Shop\ShopPublishEvent;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            if(auth()->user()->can('view_all_shops')){
                $shops = Shop::orderby('created_at','desc')->latest('id');
            }else{
                $shops = auth()->user()->shops()->orderby('created_at','desc')->latest('id');
            }

            return Datatables::of($shops)
            ->editColumn('created_at',function(Shop $shop){
                return $shop->created_at->diffForHumans();
            })
            ->editColumn('owner',function(Shop $shop){
                return $shop->owner->firstname.','.$shop->owner->lastname;
            })
            ->editColumn('products_count',function(Shop $shop){
                return $shop->products->count();
            })
            ->addColumn('status',function(Shop $shop){
                if($shop->status == true){
                    return '<div class="badge badge-success">Enabled</div>';
                }else{
                    return '<div class="badge badge-warning">Disabled</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('shop.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-20 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','products_count','owner'])
            ->make(true);


        }


        return view('admin.pages.shop.shop');

    }

    public function create()
    {
        return view('admin.pages.shop.shop_add');
    }

    public function store(ShopRequest $request)
    {
        //return $request->all();
        $validate = $request->validate([
            'name' => 'required|unique:shops'
        ],[
            'name.required' => 'Shop name is required',
        ]);

        $shop = New Shop;
        $shop->user_id = auth()->user()->id;
        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->status = $request->status == 'enabled' ? 1 : 0;
        $shop->save();

        //This will trigger tew shop created event
        if($shop){
            event(new ShopPublishEvent(auth()->user(), $shop));
        }


        return redirect()->route('shop.index')
        ->with([
            'message'    =>'Shop Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);

        return response()->json($shop);
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        //return response()->json($shop);

        return view('admin.pages.shop.shop_edit',compact('shop'));
    }

    public function update(ShopRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Shop name is required',
        ]);

        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->status = $request->status == 'enabled' ? 1 : 0;
        $shop->save();

        return redirect()->route('shop.index')
        ->with([
            'message'    =>'Shop Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Shop::destroy($id);

        return response()->json(null, 204);
    }
}
