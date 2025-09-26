<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Audio'],
            ['name' => 'Cameras & Camcorders'],
            ['name' => 'Car Electronics & GPS'],
            ['name' => 'Cell Phones'],
            ['name' => 'Computers & Tablets'],
            ['name' => 'Monitors'],
            ['name' => 'TV & Video'],
            ['name' => 'Video Games'],
        ]);
    }
}
