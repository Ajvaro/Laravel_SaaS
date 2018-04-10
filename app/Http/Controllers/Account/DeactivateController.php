<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\DeactivateAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeactivateController extends Controller
{
    public function index()
    {
        return view('account.deactivate.index');
    }

    public function store(DeactivateAccountRequest $request)
    {
        $user = $request->user();

        if($user->subscribed('primary')) {
            $user->subscription('primary')->cancel();
        }

        $user->delete();

        return redirect()->home()->withSuccess('Account deactivated.');
    }
}
