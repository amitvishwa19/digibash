<?php

namespace App\Http\Controllers\Digishop\Admin;

use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            //$orders = Order::with('user')->orderby('created_at','desc')->latest('id');
            $orders = Order::with('user')->orderby('created_at','desc')->latest('id');
            return Datatables::of($orders)
            ->editColumn('created_at',function(Order $order){
                return $order->created_at->diffForHumans();
            })
            ->addColumn('user',function(Order $order){
                return $order->user->firstname.','.$order->user->lastname;
            })
            ->addColumn('status',function(Order $order){
                if($order->payment_status == 'success'){
                    return '<div class="badge badge-success">Succcess</div>';
                }elseif($order->payment_status == 'pending'){
                    return '<div class="badge badge-warning">Pending</div>';
                }else{
                    return '<div class="badge badge-danger">Fail</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('order.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('order.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','user'])
            ->make(true);


        }

        $success_orders = Order::where('payment_status','success')->sum('payment_amount');
        $pending_orders = Order::where('payment_status','pending')->sum('payment_amount');
        $fail_orders = Order::where('payment_status','fail')->sum('payment_amount');

        return view('digishop.admin.pages.order.order',compact('success_orders','pending_orders','fail_orders'));

    }

    public function create()
    {
        return view('digishop.admin.pages.order.order_add');
    }

    public function store(OrderRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $order = New Order;
        $order->name = $request->name;
        $order->save();

        return redirect()->route('order.index')
        ->with([
            'message'    =>'Order Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        //return response()->json($order);

        return view('digishop.admin.pages.order.order_edit',compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->name = $request->name;
        $order->save();

        return redirect()->route('order.index')
        ->with([
            'message'    =>'Order Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json(null, 204);
    }
}
