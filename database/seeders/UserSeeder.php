<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name'=>'Admin',
            'last_name'=>'User',
            'name'=>'Amin',
            'email'=>'admin@demo.com',
            'password' => Hash::make('Admin@123'),
            'user_role' => 1,
            'gender' => 1,
            'city' => 'New Delhi',
            'address' => '230, Kingsway Camp, New Delhi, Delhi-111090',
            'mobile'=>'+91976962998',
            'confirm_status'=> 1,
            'status' => 1,
            'remember_token'=>mt_rand(),
        ]);
    }
}
