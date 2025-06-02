<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    public function run()
    {
        $images = [
            [
                'image' => 'product1.jpg',
                'name' => 'Produk A',
                'description' => 'Deskripsi produk A yang menarik.',
            ],
            [
                'image' => 'product2.jpg',
                'name' => 'Produk B',
                'description' => 'Deskripsi produk B dengan fitur unggulan.',
            ],
            [
                'image' => 'product3.jpg',
                'name' => 'Produk C',
                'description' => 'Deskripsi produk C yang inovatif dan modern.',
            ],
            [
                'image' => 'product4.jpg',
                'name' => 'Produk D',
                'description' => 'Deskripsi produk D dengan kualitas terbaik.',
            ],
            [
                'image' => 'product5.jpg',
                'name' => 'Produk E',
                'description' => 'Deskripsi produk E yang populer di pasaran.',
            ],
        ];

        DB::table('product_image')->insert($images);
    }
}
