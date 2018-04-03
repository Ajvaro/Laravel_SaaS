<?php

namespace App\Http\Controllers\Auth;

use App\Models\ConfirmationToken;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['confirmation_token.expired:/']);
    }

    /**
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Activates User account, logs in, redirects to Dashboard with message
     *
     * @param ConfirmationToken $token
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function activate(ConfirmationToken $token, Request $request)
    {
        $token->user->update([
            'activated' => true
        ]);

        $token->delete();

        Auth::loginUsingId($token->user->id);

        return redirect()->intended($this->redirectPath())
                         ->withSuccess('You are now signed in.');
    }

    /**
     * @return string
     */
    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
