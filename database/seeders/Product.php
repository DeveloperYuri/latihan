<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];

        foreach (range(1, 100) as $i) {
            $data[] = [
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('product')->insert($data);
    }
}
