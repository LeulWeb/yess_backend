<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // admin
        DB::table('users')->insert([
            'name'=>'super_admin',
            'username' => 'Taye',
            'email' => 'taye@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'super_admin',
            'phone'=>'0909',
            'status' => 'active',
        ]);
        DB::table('users')->insert([
            'name'=>'admin_name',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('222'),
            'role' => 'admin',
            'phone'=>'0906',
            'status' => 'active',
        ]);

        // member
        DB::table('users')->insert([
            'name'=>'member_name',
            'username' =>'member',
            'email' =>'member@gmail.com',
            'password' => Hash::make('333'),
            'role' =>'member',
            'phone'=>'0908',
           'status' => 'active',
        ]);

        //user
        DB::table('users')->insert([
            'username' => 'user',
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('444'),
            'role' => 'user',
            'phone'=>'0907',
          'status' => 'active',
        ]);
    }
}
