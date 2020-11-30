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
        //GADIPAKAI LG, UDAH OTOMATIS KETIKA MIGRATE LGSUNG SEED
        // $this->call(UserSeeder::class);
        // $this->call(PizzaSeeder::class);

        //HARAP LAKUKAN STEP DIBAWAH INI UNTUK NGESEED
        // 1. composer dump-autoload
        // 2. php artisan migrate

    }
}
