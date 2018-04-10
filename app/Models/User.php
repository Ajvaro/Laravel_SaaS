<?php

namespace App\Models;

use App\Models\traits\HasSubscriptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\traits\HasConfirmationTokens;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class User extends Authenticatable
{
    use Notifiable,
        HasConfirmationTokens,
        Billable,
        HasSubscriptions,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Checks if User account has been activated
     *
     * @return mixed
     */
    public function hasActivated()
    {
        return $this->activated;
    }

    /**
     *  Checks if User account hasn't been activated
     *
     * @return bool
     */
    public function hasNotActivated()
    {
        return !$this->hasActivated();
    }


    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public function plan()
    {
        return $this->plans->first();
    }


    public function getPlanAttribute()
    {
        return $this->plan();
    }


    public function plans()
    {
        return $this->hasManyThrough(
            Plan::class, Subscription::class, 'user_id', 'gateway_id', 'id', 'stripe_plan')
                    ->orderBy('subscriptions.created_at', 'desc');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
