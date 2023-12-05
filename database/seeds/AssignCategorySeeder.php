<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = DB::table('categories')->where('slug', 'dien-thoai')->value('id');

        DB::table('producers')->update(['category_id' => $categoryId]);
    }
}
