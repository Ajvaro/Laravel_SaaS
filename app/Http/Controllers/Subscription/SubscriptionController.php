<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Requests\Subscription\SubscriptionStoreRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Plan::active()->get();
        return view('subscriptions.index', compact('plans'));
    }

    public function store(SubscriptionStoreRequest $request)
    {
       $subscription = $request->user()->newSubscription('primary', $request->plan);

       if($request->has('coupon')) {
           $subscription->withCoupon($request->coupon);
       }

       $subscription->create($request->token);


        return redirect('/')->withSuccess('Thanks for becoming subscriber');
    }
}
