<?php

namespace App\Http\Controllers\Subscription;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanTeamController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $plans = Plan::active()->forTeams()->get();
        return view('subscriptions.plans.teams.index', compact('plans'));
    }
}
