<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $currentDateTime = Carbon::now();

        foreach (range(1, 20) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->text,
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'sale_price' => $faker->numberBetween($min = 500, $max = 8000),
                'image' => $faker->imageUrl(),
                'short_description' => $faker->paragraph($nb =2),
                'description'=> $faker->paragraph($nb =8),
                'created_at'=> $currentDateTime,
                'updated_at'=> $currentDateTime,
            ]);
        }
    }
}
