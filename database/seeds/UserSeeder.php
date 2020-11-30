<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1'),
            'address' => 'rumah admin1',
            'phone' => '123456',
            'gender' => 'admin1',
            'role' => 'admin',
            // 'remember_token' => 'yes',
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin2'),//ini tadi kalo string doang gabisa dilogin, musti masukin udah versi di hash
            'address' => 'rumah admin2',
            'phone' => '1234567',
            'gender' => 'admin',
            'role' => 'admin',
            // 'remember_token' => 'yes',//ini gimanah ya
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',//emailnya bisa gapake @gmail.com kalo masukin lewat seeder gini
            'email_verified_at' => now(),
            'password' => Hash::make('user1'),
            'address' => 'rumah user1',
            'phone' => '1234567',//phone kalo di UI minimal 9 angka tapi di seeder gini masih bisa
            'gender' => 'user1',// ini jg bisa bukan male/female
            'role' => 'user',
            // 'remember_token' => 'yes',
            'created_at' => now()
        ]);
    }
}
