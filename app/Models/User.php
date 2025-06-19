<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_array($role)) {
            return $this->roles->contains(function ($r) use ($role) {
                return in_array(Str::lower($r->name), array_map('Str::lower', (array)$role));
            });
        }
        
        return $this->roles->contains(function ($r) use ($role) {
            return Str::lower($r->name) === Str::lower($role);
        });
    }

    /**
     * Assign a role to the user.
     *
     * @param string|Role $role
     * @return $this
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::firstOrCreate(['name' => $role]);
        }

        if (!$this->hasRole($role->name)) {
            $this->roles()->attach($role);
        }

        return $this;
    }

    /**
     * Remove a role from the user.
     *
     * @param string|Role $role
     * @return $this
     */
    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        if ($role) {
            $this->roles()->detach($role);
        }

        return $this;
    }

    /**
     * Sync multiple roles to the user.
     *
     * @param array $roles
     * @return $this
     */
    public function syncRoles($roles)
    {
        $roleIds = [];
        
        foreach ((array)$roles as $role) {
            if (is_string($role)) {
                $role = Role::firstOrCreate(['name' => $role]);
            }
            $roleIds[] = $role->id;
        }

        $this->roles()->sync($roleIds);
        
        return $this;
    }

    /**
     * Get all role names as an array.
     *
     * @return array
     */
    public function getRoleNames()
    {
        return $this->roles->pluck('name')->toArray();
    }

    /**
     * Check if the user has any of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return $this->hasRole($roles);
    }

    /**
     * Check if the user has all of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAllRoles($roles)
    {
        $existingRoles = $this->getRoleNames();
        
        foreach ($roles as $role) {
            if (!in_array(Str::lower($role), array_map('Str::lower', $existingRoles))) {
                return false;
            }
        }
        
        return true;
    }
}