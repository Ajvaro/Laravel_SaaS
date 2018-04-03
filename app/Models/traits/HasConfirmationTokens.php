<?php

namespace App\Models\traits;

use App\Models\ConfirmationToken;

trait HasConfirmationTokens
{


    /**
     *Generates and returns confirmation token
     *
     * @return string
     */
    public function generateConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token' => $token = str_random(200),
            'expires_at' => $this->getConfirmationTokenExpiry()
        ]);

        return $token;
    }


    /**
     * User can only have one token
     *
     * @return mixed
     */
    public function confirmationToken()
    {
        return $this->hasOne(ConfirmationToken::class);
    }

    /**
     * Sets expiry timestamp for confirmation token
     *
     * @return mixed
     */
    protected function getConfirmationTokenExpiry()
    {
        return $this->freshTimestamp()->addMinutes(10);
    }
}