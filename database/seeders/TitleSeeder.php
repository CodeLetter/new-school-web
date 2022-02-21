<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Title::create(['text'=>'科技大學校園資訊系統','img'=>'01B01.jpg','sh'=>'1']);
        Title::create(['text'=>'高雄大學校園資訊系統','img'=>'01B03.jpg','sh'=>'0']);
        Title::create(['text'=>'台北大學校園資訊系統','img'=>'01B04.jpg','sh'=>'0']);
    }
}
