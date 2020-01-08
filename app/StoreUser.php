<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreUser extends Model
{
    protected $table = 'store_user';

    protected $fillable = ['user_id', 'store_id'];
}
