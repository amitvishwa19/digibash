<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subscriptions = Subscription::orderby('created_at','desc')->get();

            return Datatables::of($subscriptions)
            ->editColumn('created_at',function(Subscription $subscription){
                    return $subscription->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('subscription.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('subscription.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }
        

        return view('admin.pages.subscription.subscription');

    }

    public function create()
    {
        return view('admin.pages.subscription.subscription_add');
    }

    public function store(SubscriptionRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $subscription = New Subscription;
        $subscription->name = $request->name;
        $subscription->save();

        return redirect()->route('subscription.index')
        ->with([
            'message'    =>'Subscription Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);

        return response()->json($subscription);
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);

        //return response()->json($subscription);

        return view('admin.pages.subscription.subscription_edit',compact('subscription'));
    }

    public function update(SubscriptionRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->name = $request->name;
        $subscription->save();

        return redirect()->route('subscription.index')
        ->with([
            'message'    =>'Subscription Updated Successfully',
            'alert-type' => 'success',
        ]);

        
    }

    public function destroy($id)
    {
        Subscription::destroy($id);

        return response()->json(null, 204);
    }
}