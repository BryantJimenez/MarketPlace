<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentProduct extends Model
{
    protected $table = 'payment_product';

    protected $fillable = ['product_id', 'payment_id', 'bank', 'qty', 'ofert', 'price', 'state'];
}
