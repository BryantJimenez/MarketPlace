<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['price', 'address', 'lat', 'lng', 'payment_id'];

    public function payment() {
		return $this->belongsTo(Payment::class);
	}
}
