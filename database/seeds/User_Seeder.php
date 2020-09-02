<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname'=> 'Pawin',
            'lastname' => 'lauphet',
            'phone_number'=> '0841048064',
            'user_type_id' => 2,
            'name'=> 'safe',
            'address'=> 1,
            'email'=> 'safesafe000@hotmai.com',
            'password'=> Hash::make('123456789')
        ]);
        User::create([
            'firstname'=> 'demo1',
            'lastname' => 'demo123',
            'phone_number'=> '0111523654',
            'user_type_id' => 1,
            'name'=> 'demo2',
            'address'=> 2,
            'email'=> 'a@hotmai.com',
            'password'=> Hash::make('123456789')
        ]);
        User::create([
            'firstname'=> 'demo2',
            'lastname' => 'demo234',
            'phone_number'=> '02234557854',
            'user_type_id' => 1,
            'name'=> 'demo1',
            'address'=> 3,
            'email'=> 'a@a.com',
            'password'=> Hash::make('123456789')
        ]);
    }
}
