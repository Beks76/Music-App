<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'first_name',	
        'last_name',
        'location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function getName()
    {
        if($this->first_name & $this->last_name)
        {
            return "{$this->first_name}  {$this->last_name}";
        }

        if($this->first_name)
        {
            return "{$this->first_name}";
        }

        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function hasAnyRoles($roles)
    {   
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
