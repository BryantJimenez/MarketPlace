<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    	'title',
    	 'slug', 
    	 'content', 
    	 'state', 
    	 'user_id'];

    public function user() {
		return $this->belongsTo(User::class);
	}

    public function comments() {
		return $this->hasMany(Comment::class);
	}
}
