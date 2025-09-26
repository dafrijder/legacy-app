<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'BenQ', 'category_id' => rand(1,8)],
            ['name' => 'Garmin', 'category_id' => rand(1,8)],
            ['name' => 'TPI Corporation', 'category_id' => rand(1,8)],
            ['name' => 'Land Pride', 'category_id' => rand(1,8)],
            ['name' => 'Humminbird', 'category_id' => rand(1,8)],
            ['name' => 'IOGear', 'category_id' => rand(1,8)],
            ['name' => 'Kohler', 'category_id' => rand(1,8)],
            ['name' => 'ProForm', 'category_id' => rand(1,8)],
            ['name' => 'Grizzly', 'category_id' => rand(1,8)],
            ['name' => 'Furuno', 'category_id' => rand(1,8)],
            ['name' => 'DigiTech', 'category_id' => rand(1,8)],
            ['name' => 'Yamaha', 'category_id' => rand(1,8)],
            ['name' => 'Samson', 'category_id' => rand(1,8)],
            ['name' => 'JBL', 'category_id' => rand(1,8)],
            ['name' => 'Crown Audio', 'category_id' => rand(1,8)],
            ['name' => 'MTX Audio', 'category_id' => rand(1,8)],
            ['name' => 'Musica', 'category_id' => rand(1,8)],
            ['name' => 'DCM Speakers', 'category_id' => rand(1,8)],
            ['name' => 'AOC', 'category_id' => rand(1,8)],
            ['name' => 'ALCATEL Mobile Phones', 'category_id' => rand(1,8)],
            ['name' => 'Huawei', 'category_id' => rand(1,8)],
            ['name' => 'ZTE', 'category_id' => rand(1,8)],
            ['name' => 'Motorola', 'category_id' => rand(1,8)],
            ['name' => 'Palm', 'category_id' => rand(1,8)],
            ['name' => 'LG Electronics', 'category_id' => rand(1,8)],
            ['name' => 'Samsung', 'category_id' => rand(1,8)],
            ['name' => 'Sony', 'category_id' => rand(1,8)],
            ['name' => 'Pantech', 'category_id' => rand(1,8)],
            ['name' => 'Citizen', 'category_id' => rand(1,8)],
            ['name' => 'Aastra Telecom', 'category_id' => rand(1,8)],
            ['name' => 'RCA', 'category_id' => rand(1,8)],
            ['name' => 'VTech', 'category_id' => rand(1,8)],
            ['name' => 'Uniden', 'category_id' => rand(1,8)],
            ['name' => 'AT&T', 'category_id' => rand(1,8)],
            ['name' => 'GE', 'category_id' => rand(1,8)],
            ['name' => 'Toshiba', 'category_id' => rand(1,8)],
            ['name' => 'Dell', 'category_id' => rand(1,8)],
            ['name' => 'Fujitsu', 'category_id' => rand(1,8)],
            ['name' => 'Lenovo', 'category_id' => rand(1,8)],
            ['name' => 'Apple', 'category_id' => rand(1,8)],
            ['name' => 'Carl Zeiss', 'category_id' => rand(1,8)],
            ['name' => 'Kowa', 'category_id' => rand(1,8)],
            ['name' => 'Pioneer', 'category_id' => rand(1,8)],
        ]);
    }
}
