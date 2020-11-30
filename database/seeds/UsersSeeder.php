<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
            'phone' => '123456789',
            'gender' => 'Female',
            'role' => 'admin',
            // 'remember_token' => 'yes',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin2'),
            'address' => 'rumah admin2',
            'phone' => '123456789',
            'gender' => 'Male',
            'role' => 'admin',
            // 'remember_token' => 'yes',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'member1',
            'email' => 'member1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('member1'),
            'address' => 'rumah member1',
            'phone' => '123456789',
            'gender' => 'Male',
            'role' => 'member',
            // 'remember_token' => 'yes',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'member2',
            'email' => 'member2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('member2'),
            'address' => 'rumah member2',
            'phone' => '123456789',
            'gender' => 'Female',
            'role' => 'member',
            // 'remember_token' => 'yes',
            'created_at' => now(),
        ]);
    }
}
