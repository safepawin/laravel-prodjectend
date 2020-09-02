<?php

use App\Product;
use Illuminate\Database\Seeder;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name'=> 'ดอกไม้สีชมพู',
            'product_detail'=> 'ดอกไม้สีชมพูกลิ่นอโลม่า',
            'product_price'=> 30,
            'product_quantity'=> 20,
            'preview_image' => '',
            'store_id'=> '1',
            'category_id'=> 13
        ]);
        Product::create([
            'product_name'=> 'กระเป๋าทำมือ สีขาว',
            'product_detail'=> 'กระเป๋าทำมือสีขาว แข็งแรงทนทาน สวยงาม',
            'product_price'=> 290,
            'product_quantity'=> 5,
            'preview_image' => '',
            'store_id'=> '',
            'category_id'=> 13
        ]);
    }
}
