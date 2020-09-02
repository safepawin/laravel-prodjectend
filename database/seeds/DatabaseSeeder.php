<?php

use App\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(User_Type_Seeder::class);
        $this->call(Category_Seeder::class);
        $this->call(User_Seeder::class);
        $this->call(Address_Seeder::class);
    }
}
