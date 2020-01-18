<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['payment_id'];

    public function bank() {
        return $this->belongsTo(Bank::class);
    }
}
