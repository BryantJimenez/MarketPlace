<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'lastname', 'phone', 'photo', 'slug', 'email', 'password', 'state', 'type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs() {
        return $this->hasMany(Blogs::class);
    }

    public function comments() {
        return $this->hasMany(Comments::class);
    }

    public function stores() {
        return $this->belongsToMany(Store::class)->withTimestamps();
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
