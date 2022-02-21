<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Image::create(['img'=>'01D01.jpg','sh'=>'1']);
        Image::create(['img'=>'01D02.jpg','sh'=>'1']);
        Image::create(['img'=>'01D05.jpg','sh'=>'1']);
        Image::create(['img'=>'01D06.jpg','sh'=>'1']);
    }
}
