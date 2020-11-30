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
        // $this->call(UserSeeder::class);
        DB::table('pizzas')->insert([
            // 'id' => 1,
            'pizza_name' => 'Cheezu Pizza',
            'price' => '49900',
            'desc' => "Pizza rasa keju yang mantap. Lorem ipsum dolor.",
            'image' => 'cheese.jpg',
            // 'image' => 'assets/cheese.jpg'
            // 'image' => 'https://italianexpressonline.com/product/cheese-pizza-2/'
        ]);
    }
}
