<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;



class ProductComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];

        foreach (range(1, 20) as $i) {
            $data[] = [
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'slug' => $faker->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('product_component')->insert($data);
    }
}
