<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['slug', 'shape', 'type', 'total', 'reference', 'description', 'state', 'explanation', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
		return $this->belongsToMany(Product::class)->withPivot('qty', 'price')->withTimestamps();
	}
}
