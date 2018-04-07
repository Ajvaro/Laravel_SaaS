<?php

namespace App\Models\traits;

trait HasSubscriptions
{

    /**
     * @return mixed
     */
    public function hasSubscription()
    {
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

    public function isCustomer()
    {
        return $this->hasStripeId();
    }
}