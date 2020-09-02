<?php

use App\Store;
use Illuminate\Database\Seeder;

class Store_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'store_name'=> 'ร้าน ขาย ดอกไม้เทียม',
            'store_detail'=> 'ร้านนี้เปนร้าน ที่มีประวัติการทำยาวนาน และ มี จุดเด่นคือกลิ้น ที่่หอม แหละหน้าตาที่สวยงาม',
            'user_id'=> 2
        ]);
        Store::create([
            'store_name'=> 'ร้าน ขาย กระเป๋าทำมือ',
            'store_detail'=> 'กระเป๋าทำมือ ทำด้วยความปรานีท และการตรวจสอบจากมือผู้ทำว่าไม่มีตำหนิแน่นอน',
            'user_id'=> 3
        ]);
    }
}
