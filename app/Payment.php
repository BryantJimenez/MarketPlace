<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['slug', 'shape', 'type', 'total', 'reference', 'currency', 'device', 'description', 'state', 'explanation', 'ip_country_id', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function products() {
		return $this->belongsToMany(Product::class)->withPivot('bank', 'qty', 'price', 'state')->withTimestamps();
	}

	public function card() {
        return $this->hasOne(Card::class);
    }

    public function transfer() {
        return $this->hasOne(Transfer::class);
    }

    public function delivery() {
        return $this->hasOne(Delivery::class);
    }
}
