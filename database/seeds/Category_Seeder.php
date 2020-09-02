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
            'category_name'=> 'ผลิตภัณฑ์ประดิษฐ์จากวัสดุผสม'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์ประดิษฐ์จากเศษไม้'
        ]);
        Category::create([
            'category_name'=> 'กระเป๋าผ้า'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์จากเส้นพลาสติก'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์จากใบลาน'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์จากหวาย'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์จักสานไม้ไผ่'
        ]);
        Category::create([
            'category_name'=> 'ดอกไม้ประดิษฐ์จากวัสดุธรรมชาติ'
        ]);
        Category::create([
            'category_name'=> 'งานประดิษฐ์จากผ้า'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์ของจิ๋ว'
        ]);
        Category::create([
            'category_name'=> 'ผลิตภัณฑ์ประดิษฐ์จากหนังเทียม'
        ]);
        Category::create([
            'category_name'=> 'ดอกไม้ทำมือ'
        ]);
        Category::create([
            'category_name'=> 'อื่นๆ'
        ]);
    }
}

//http://tcps.tisi.go.th/public/certificatelist.aspx?province=14&provincename=%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%A8%E0%B8%A3%E0%B8%B5%E0%B8%AD%E0%B8%A2%E0%B8%B8%E0%B8%98%E0%B8%A2%E0%B8%B2
