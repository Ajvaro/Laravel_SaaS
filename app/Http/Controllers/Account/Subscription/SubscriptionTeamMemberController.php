<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Requests\Account\SubscriptionTeamMemberStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionTeamMemberController extends Controller
{
    /**
     * @param SubscriptionTeamMemberStoreRequest $request
     * @return mixed
     */
    public function store(SubscriptionTeamMemberStoreRequest $request)
    {
        if($this->teamLimitReached($request)) {
            return back()->withError('You have reached team maximum size');
        }

        $request->user()->team->users()->syncWithoutDetaching([
            User::where('email', $request->email)->first()->id
        ]);

        return back()->withSuccess('Team member added.');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function destroy(Request $request, User $user)
    {
        $request->user()->team->users()->detach($user->id);

        return back()->withSuccess('Member removed from team');
    }

    /**
     * @param $request
     * @return bool
     */
    protected function teamLimitReached($request)
    {
        return $request->user()->team->users->count() === $request->user()->plan->teams_limit;
    }
}
