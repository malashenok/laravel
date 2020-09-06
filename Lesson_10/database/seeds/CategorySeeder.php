<?php

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
        $category = [
            [
                'text' => 'Спорт',
                'slug' => 'sport'
            ],
            [
                'text' => 'Политика',
                'slug' => 'politics'
            ],
            [
                'text' => 'Экономика',
                'slug' => 'business'
            ],
            [
                'text' => 'Наука',
                'slug' => 'science'
            ],
            [
                'text' => 'Технологии',
                'slug' => 'computers'
            ],
            [
                'text' => 'Авто',
                'slug' => 'auto'
            ],
        ];

        DB::table('categories')->insert($category);
    }
}
