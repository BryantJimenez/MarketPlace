<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = ['name', 'slug', 'district_id', 'brand_id', 'address', 'phone', 'lat', 'lng', 'owner', 'video', 'type', 'user_id'];

    public function user() {
		return $this->belongsTo(User::class);
	}

	public function district() {
		return $this->belongsTo(District::class);
	}

    public function brand() {
		return $this->belongsTo(Brand::class);
	}
}
