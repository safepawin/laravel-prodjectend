<?php

use App\Address;
use Illuminate\Database\Seeder;

class Address_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'address'=> '57/1 ม.1 ต.บางไทร อ.บางปะอิน จ.พระนครศรีอยุธยา',
            'user_id' => '1'
        ]);
        Address::create([
            'address'=> 'demo1 517/1 ม.7 ต.บางไทร อ.บางปะอิน จ.พระนครศรีอยุธยา',
            'user_id' => '2'
        ]);
        Address::create([
            'address'=> 'demo2 984/1 ม.1 ต.หัวรอ อ.บางปะอิน จ.พระนครศรีอยุธยา',
            'user_id' => '3'
        ]);
    }
}
