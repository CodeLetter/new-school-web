<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ad;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ad::create(['text'=>'轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動','sh'=>'1']);
        Ad::create(['text'=>'轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法','sh'=>'1']);
        Ad::create(['text'=>'轉知2012年全國青年水墨創作大賽活動','sh'=>'1']);
        Ad::create(['text'=>'欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加','sh'=>'1']);
    }
}
