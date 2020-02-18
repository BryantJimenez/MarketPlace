<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'slug', 'district_id', 'address', 'phone', 'lat', 'lng', 'owner'];

    public function users() {
		return $this->belongsToMany(User::class)->withTimestamps();
	}

	public function district() {
		return $this->belongsTo(District::class);
	}

    public function products() {
		return $this->belongsToMany(Product::class)->withTimestamps();
	}
}
