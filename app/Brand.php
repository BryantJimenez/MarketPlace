<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'image'];

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function workshops() {
        return $this->hasMany(Workshop::class);
    }
}
