<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Điện thoại', 'slug' => 'dien-thoai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Đồng hồ', 'slug' => 'dong-ho', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phụ kiện', 'slug' => 'phu-kien', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
