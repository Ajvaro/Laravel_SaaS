<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Requests\Subscription\SubscriptionSwapStoreRequest;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionSwapController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $plans = Plan::except(auth()->user()->plan->id)->active()->get();

        return view('account.subscriptions.swap.index', compact('plans'));
    }

    /**
     * @param SubscriptionSwapStoreRequest $request
     * @return mixed
     */
    public function store(SubscriptionSwapStoreRequest $request)
    {
        $user = $request->user();

        $plan = Plan::where('gateway_id', $request->plan)->first();

        if($this->downgradesFromTeamPlan($user, $plan)){
            $user->team->users()->detach();
        }

        $user->subscription('primary')->swap($plan->gateway_id);

        return  back()->withSuccess('Your subscription plan has been changed.');
    }

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     */
    protected function downgradesFromTeamPlan(User $user, Plan $plan)
    {
        if($user->plan->isForTeams() && $plan->isNotForTeams()) {
            return true;
        }

        return false;
    }
}
