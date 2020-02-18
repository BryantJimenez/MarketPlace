<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'qty', 'description', 'min', 'ofert', 'all', 'brand_id', 'subcategory_id'];

    public function subcategory() {
		return $this->belongsTo(Subcategory::class);
	}

	public function stores() {
		return $this->belongsToMany(Store::class)->withTimestamps();
	}

	public function brand() {
		return $this->belongsTo(BrandProduct::class);
	}

	public function brands() {
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }

	public function images() {
		return $this->hasMany(ImageProduct::class);
	}

	public function payments() {
		return $this->belongsToMany(Payments::class)->withPivot('qty', 'price')->withTimestamps();
	}
}
