<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * @return bool
     */
    public function isForTeams()
    {
        return $this->teams_enabled === true;
    }

    /**
     * @return bool
     */
    public function isNotForTeams()
    {
        return !$this->isForTeams();
    }

    /**
     * @param Builder $builder
     * @return Builder $builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', true);
    }

    /**
     * @param Builder $builder
     * @return Builder $builder
     */
    public function scopeForUsers(Builder $builder)
    {
        return $builder->where('teams_enabled', false);
    }

    /**
     * @param Builder $builder
     * @return Builder $builder
     */
    public function scopeForTeams(Builder $builder)
    {
        return $builder->where('teams_enabled', true);
    }

    /**
     * @param Builder $builder
     * @param $planId
     * @return $this
     */
    public function scopeExcept(Builder $builder, $planId)
    {
        return $builder->where('id', '!=', $planId);
    }
}
