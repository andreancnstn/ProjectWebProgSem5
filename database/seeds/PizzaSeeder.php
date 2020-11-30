<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'pizza_name' => 'Beef Chicken Pizza',
            'price' => '19900',
            'desc' => "Pizza rasa beef dan chicken. Very tasty.",
            'image' => 'image/bcp.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Bacon and Egg Pizza',
            'price' => '29900',
            'desc' => "Pizza dengan topping bacon dan egg. Dijamin ketagihan.",
            'image' => 'image/bne.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Beef Pepper Onion Pizza',
            'price' => '39900',
            'desc' => "Pizza classic dengan taburan pepper dan onion yang megah.",
            'image' => 'image/bpo.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Cheezu Pizza',
            'price' => '49900',
            'desc' => "Pizza rasa keju yang melting dan yummy.",
            'image' => 'image/cheese.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Garlic Chicken Pizza',
            'price' => '59900',
            'desc' => "Pizza ditaburi garlic chicken yang mantap.",
            'image' => 'image/gcp.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Gluten Free Pizza',
            'price' => '69900',
            'desc' => "Pizza khusus yang bebas dari gluten. Untuk orang dengan alergi gluten.",
            'image' => 'image/glutenjpeg.jpeg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Hawaiian Pizza',
            'price' => '79900',
            'desc' => "Pizza hawaiian dengan nuansa tropis.",
            'image' => 'image/hawaii.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Italian Pizza',
            'price' => '89900',
            'desc' => "Pizza rasa autentik dari negara Italia.",
            'image' => 'image/italian.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Pepperoni Pizza',
            'price' => '99900',
            'desc' => "Pizza dengan taburan pepperoni yang mantap dan menggugah selera.",
            'image' => 'image/pepperoni.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Super Supreme Pizza',
            'price' => '109900',
            'desc' => "Pizza dengan topping yang komplit dijamin bikin ketagihan.",
            'image' => 'image/supreme.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Tuna Pizza',
            'price' => '119900',
            'desc' => "Pizza ditaburi tuna yang melting di mulut dan di perut.",
            'image' => 'image/tuna.jpg',
            'created_at' => now()
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Wheat Pizza',
            'price' => '129900',
            'desc' => "Pizza dengan bahan dasar wheat yang pasti bikin kenyang.",
            'image' => 'image/wheat.jpg',
            'created_at' => now()
        ]);
    }
}
