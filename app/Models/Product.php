<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $filable =
        [
            'nama_product',
            'image_product',
            'harga_product',
            'stoct_product',
        ];
}
