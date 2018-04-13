<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ImpersonateStartRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.impersonate.index');
    }

    /**
     * @param ImpersonateStartRequest $request
     * @return mixed
     */
    public function start(ImpersonateStartRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        session()->put('impersonate', $user->id);

        return redirect('/')->withSuccess('You are now impersonating ' . $user->name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        session()->forget('impersonate');

        return redirect('/');
    }
}
