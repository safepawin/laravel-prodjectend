<?php

use App\User_type;
use Illuminate\Database\Seeder;

class User_Type_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User_type::create([
            'id' => 1,
            'type_name' => 'seller'
        ]);
        User_type::create([
            'id' => 2,
            'type_name' => 'admin'
        ]);
        User_type::create([
            'id' => 3,
            'type_name' => 'baned'
        ]);
    }
}

