<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'nama_product' => 'Product Item',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item2',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item3',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item4',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item5',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item6',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item7',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item8',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item9',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item10',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item11',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
        Product::create([
            'nama_product' => 'Product Item12',
            'image_product' => '/dist/img/default-150x150.png',
            'harga_product' => '1000000',
            'stock_product' => '101',
        ]);
    }
}
