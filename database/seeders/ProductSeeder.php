<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'          =>'iphone ',
                'price'         => '6500',
                'category'      => 'Electronics',
                'description'   => 'Smart Phone with 20GB Ram HD 9GB',
                'gallary'       => 'https://cf1.s3.souqcdn.com/item/2021/01/03/13/22/35/12/6/item_L_132235126_62a803283b2bf.jpg',
            ],
            [
                'name'          =>'Dell Laptop',
                'price'         => '4000',
                'category'      => 'Electronics',
                'description'   => 'Smart Laptop with 2GB Ram HD 180GB',
                'gallary'       => 'https://cf3.s3.souqcdn.com/item/2020/11/16/13/20/78/21/0/item_L_132078210_c62ddfa111fdf.jpg',
            ],
            [
                'name'          =>'Laptop Toshiba',
                'price'         => '8000',
                'category'      => 'Electronics',
                'description'   => 'Smart Laptop with 8GB Ram HD 256GB',
                'gallary'       => 'https://cf2.s3.souqcdn.com/item/2020/12/29/13/22/20/61/7/item_L_132220617_fef8e06c38ff6.jpg',
            ],
        ]);
    }
}
