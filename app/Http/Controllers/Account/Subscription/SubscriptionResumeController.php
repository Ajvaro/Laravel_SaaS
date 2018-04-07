<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionResumeController extends Controller
{
    public function index()
    {
        return view('account.subscriptions.resume.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('primary')->resume();

        return redirect()->route('account.index')->withSuccess('Your subscription has been updated.');
    }
}
