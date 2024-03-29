<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreUser extends Model
{
    protected $table = 'store_user';

    protected $fillable = ['slug', 'request', 'explanation', 'state', 'user_id', 'store_id'];
}
