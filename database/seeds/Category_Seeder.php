<?php

use App\Category;
use Illuminate\Database\Seeder;

class Category_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name'=> 'อาหาร'
        ]);
        Category::create([
            'category_name'=> 'สินค้าจากชุมชน'
        ]);
        Category::create([
            'category_name'=> 'เสื้อผ้า'
        ]);
        Category::create([
            'category_name'=> 'อื่นๆ'
        ]);
    }
}
