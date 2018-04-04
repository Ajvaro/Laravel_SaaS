<?php

namespace App\Http\Controllers\Subscription;

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

    public function store()
    {

    }
}
