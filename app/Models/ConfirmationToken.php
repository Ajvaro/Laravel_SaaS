<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model
{

    /**
     * Removing default timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
      'expires_at'
    ];

    /**
     * @var array
     */
    protected $fillable = ['token', 'expires_at'];


    /**
     *
     */
    public static function boot()
    {
        static::creating(function($token) {
           optional($token->user->confirmationToken)->delete();
        });
    }


    /**
     * Setting default column for route model binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';

    }

    /**
     * Token belongs to one User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Checks if token has expired
     *
     * @return bool
     */
    public function hasExpired()
    {
        return $this->freshTimestamp()->gt($this->expires_at);
    }
}
