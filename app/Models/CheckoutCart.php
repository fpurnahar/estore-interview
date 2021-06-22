<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutCart extends Model
{
    use HasFactory;

    protected $fillable = ['id_user','id_product', 'qty', 'status_checkout'];

    public function cart_has_product()
    {
        return $this->belongsTo('App\Models\Product','id_product');
    }
}
