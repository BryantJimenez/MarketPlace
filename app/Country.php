<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'countries';
    public $timestamps = false;

    public function cards() {
        return $this->hasMany(Card::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}