<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['bank', 'brand', 'fraud_score', 'total_fee', 'transfer_amount', 'type', 'country_id', 'payment_id'];

    public function payment() {
		return $this->belongsTo(Payment::class);
	}

	public function country() {
		return $this->belongsTo(Country::class);
	}
}
