<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'qty', 'description', 'min', 'ofert', 'brand_id', 'subcategory_id'];

    public function subcategory() {
		return $this->belongsTo(Subcategory::class);
	}

	public function stores() {
		return $this->belongsToMany(Store::class)->withTimestamps();
	}

	public function brand() {
		return $this->belongsTo(Brand::class);
	}

	public function images() {
		return $this->hasMany(ImageProduct::class);
	}
}
