<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Menu::create(['text'=>'網頁首頁','href'=>'/','sh'=>'1']);
        Menu::create(['text'=>'管理登入','href'=>'/login','sh'=>'1']);
    }
}
