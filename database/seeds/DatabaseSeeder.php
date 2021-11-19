<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
       
        for($i= 1 ; $i<4; $i++)
        {
            DB::table('products')->insert([
             'product_name' => $faker->name,
             'category_id' => $i
           ]);
        }
    }
}
