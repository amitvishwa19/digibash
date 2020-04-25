<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Controllers\Controller;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        Session::flash('message', "Special message goes here");
        return view('admin.pages.subscription.subscription',compact('subscriptions'))->with('message', 'Subscribed successfully');


    }

    public function create()
    {
        $subscriptions = Subscription::latest()->get();

        return response()->json($subscriptions);
    }

    public function store(SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return view('comingsoon.index');

        return response()->json($subscription, 201);
    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);

        return response()->json($subscription);
    }

    public function update(SubscriptionRequest $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());

        return response()->json($subscription, 200);
    }

    public function destroy($id)
    {
        Subscription::destroy($id);

        return response()->json(null, 204);
    }
}