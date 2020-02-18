<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'dni', 'phone', 'photo', 'slug', 'genrer', 'birthday', 'country_id', 'district_id', 'address', 'email', 'password', 'state', 'type'];

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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function country() {
        return $this->hasOne(Country::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function stores() {
        return $this->belongsToMany(Store::class)->withTimestamps();
    }

    public function workshops() {
        return $this->hasMany(Workshop::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
