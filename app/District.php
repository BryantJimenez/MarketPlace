<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'province_id'];

    public function province() {
		return $this->belongsTo(Province::class);
	}

	public function users() {
        return $this->hasMany(User::class);
    }

	public function stores() {
        return $this->hasMany(Store::class);
    }

    public function workshops() {
        return $this->hasMany(Workshop::class);
    }
}
