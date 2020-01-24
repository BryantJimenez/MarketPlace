<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['payment_id', 'bank'];

    public function payment() {
		return $this->belongsTo(Payment::class);
	}
}
