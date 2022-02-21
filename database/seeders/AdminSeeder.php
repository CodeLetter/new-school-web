<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create(['acc'=>'leon','pw'=>Hash::make('123')]);
        Admin::create(['acc'=>'neal','pw'=>Hash::make('123')]);
        Admin::create(['acc'=>'jack','pw'=>Hash::make('123')]);
        Admin::create(['acc'=>'test','pw'=>Hash::make('123')]);
        Admin::create(['acc'=>'admin','pw'=>Hash::make('123')]);
        
    }
}
