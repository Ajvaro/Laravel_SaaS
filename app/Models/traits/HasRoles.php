<?php

namespace App\Models\traits;


use App\Models\Role;

trait HasRoles
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param $role
     * @return mixed
     */
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}