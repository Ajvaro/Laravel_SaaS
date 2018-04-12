<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\TwoFactor\TwoFactorStoreRequest;
use App\Http\Requests\TwoFactor\TwoFactorVerifyRequest;
use App\Models\Country;
use App\TwoFactor\TwoFactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwoFactorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $countries = Country::get();

        return view('account.twofactor.index', compact('countries'));
    }


    /**
     * @param TwoFactorStoreRequest $request
     * @param TwoFactor $twoFactor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TwoFactorStoreRequest $request, TwoFactor $twoFactor)
    {
        $user = $request->user();

        $user->twoFactor()->create([
           'phone' => $request->phone_number,
           'dial_code' => $request->dial_code
        ]);

        if($response = $twoFactor->register($user)) {
            $user->twoFactor()->update([
                'identifier' => $response->user->id
            ]);
        }


        return back();
    }

    /**
     * @param TwoFactorVerifyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(TwoFactorVerifyRequest $request)
    {
        $request->user()->twoFactor->update([
           'verified' => true
        ]);

        return back();
    }


    /**
     * @param Request $request
     * @param TwoFactor $twoFactor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, TwoFactor $twoFactor)
    {
        $user = $request->user();

        if($twoFactor->delete($user)) {
            $user->twoFactor()->delete();
        }

        $request->user()->twoFactor()->delete();

        return back();
    }
}
