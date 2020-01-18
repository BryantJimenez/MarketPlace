<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['slug', 'shape', 'type', 'total', 'reference', 'description', 'state', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
