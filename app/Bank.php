<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name', 'slug'];

    public function transfers() {
        return $this->hasMany(Bank::class);
    }
}
