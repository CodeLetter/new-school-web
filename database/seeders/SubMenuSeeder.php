<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubMenu;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubMenu::create(['text'=>'更多消息','href'=>'/news','menu_id'=>'1']);
    }
}
