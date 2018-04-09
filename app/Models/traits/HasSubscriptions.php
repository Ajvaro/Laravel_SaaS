<?php

namespace App\Models\traits;

trait HasSubscriptions
{

    /**
     * @return mixed
     */
    public function hasTeamSubscription()
    {
        return optional($this->plan)->isForTeams();
    }

    /**
     * @return bool
     */
    public function doesNotHaveTeamSubscription()
    {
        return !$this->hasTeamSubscription();
    }

    /**
     * @return mixed
     */
    public function hasSubscription()
    {
        if($this->hasPiggybackSubscription()) {
            return true;
        }

        return $this->subscribed('primary');
    }

    /**
     * @return bool
     */
    public function doesNotHaveSubscription()
    {
        return !$this->hasSubscription();
    }

    /**
     * @return bool
     */
    public function hasPiggybackSubscription()
    {
        foreach($this->teams as $team) {
            if($team->owner->hasSubscription()) {
                return true;
            }

            return false;
        }
    }

    /**
     * @return mixed
     */
    public function hasCancelled()
    {
        return optional($this->subscription('primary'))->cancelled();
    }

    /**
     * @return bool
     */
    public function hasNotCancelled()
    {
        return !$this->hasCancelled();
    }

    /**
     * @return mixed
     */
    public function isCustomer()
    {
        return $this->hasStripeId();
    }
}