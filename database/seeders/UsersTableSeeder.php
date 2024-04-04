<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

                //admin

                [
                    'fname' => 'Admin',
                    'lname' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('111'),
                    'role'=>'admin',
                    'status'=>'active'
                ],
                //staff
                [
                    'fname' => 'Elite Staff',
                    'lname' => 'staff',
                    'email' => 'staff@gmail.com',
                    'password' => Hash::make('111'),
                    'role'=>'staff',
                    'status'=>'active'
                ],

                //broker
                [
                    'fname' => 'Elite Broker',
                    'lname' => 'broker',
                    'email' => 'broker@gmail.com',
                    'password' => Hash::make('111'),
                    'role'=>'broker',
                    'status'=>'active'
                ],

                //user
                [
                    'fname' => 'User',
                    'lname' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('111'),
                    'role'=>'user',
                    'status'=>'active'
                ],
            ]);
    
}
}