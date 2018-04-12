<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\TwoFactor\TwoFactorVerifyRequest;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwoFactorLoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.twofactor.index');
    }

    /**
     * @param TwoFactorVerifyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(TwoFactorVerifyRequest $request)
    {
        Auth::loginUsingId($request->user()->id, session('twofactor')->remember);

        session()->forget('twofactor');

        return redirect()->intended($this->redirectPath());
    }

    /**
     * @return string
     */
    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
