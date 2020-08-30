<?php

namespace App\Http\Controllers\Digishop\Admin;

use App\Http\Requests\CouponRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coupons = Coupon::orderby('created_at','desc')->get();

            return Datatables::of($coupons)
            ->editColumn('created_at',function(Coupon $coupon){
                    return $coupon->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('coupon.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('coupon.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }


        return view('digishop.admin.pages.coupon.coupon');

    }

    public function create()
    {
        return view('digishop.admin.pages.coupon.coupon_add');
    }

    public function store(CouponRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $coupon = New Coupon;
        $coupon->name = $request->name;
        $coupon->save();

        return redirect()->route('coupon.index')
        ->with([
            'message'    =>'Coupon Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);

        return response()->json($coupon);
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        //return response()->json($coupon);

        return view('digishop.admin.pages.coupon.coupon_edit',compact('coupon'));
    }

    public function update(CouponRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->save();

        return redirect()->route('coupon.index')
        ->with([
            'message'    =>'Coupon Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Coupon::destroy($id);

        return response()->json(null, 204);
    }
}
