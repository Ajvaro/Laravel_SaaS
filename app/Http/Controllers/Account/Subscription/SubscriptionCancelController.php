<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionCancelController extends Controller
{
    public function index()
    {
        return view('account.subscriptions.cancel.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('primary')->cancel();

        return redirect()->route('account.index')->withSuccess('Your subscription has been cancelled.');
    }
}
