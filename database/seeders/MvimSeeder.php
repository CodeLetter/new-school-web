<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mvim;

class MvimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mvim::create(['img'=>'01C01.gif','sh'=>'1']);
        Mvim::create(['img'=>'01C02.gif','sh'=>'1']);
        Mvim::create(['img'=>'01C03.gif','sh'=>'1']);
        Mvim::create(['img'=>'01C04.gif','sh'=>'1']);
        Mvim::create(['img'=>'01C05.gif','sh'=>'1']);
    }
}
