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
                'slug' => 'economics'
            ],
            [
                'text' => 'Здоровье',
                'slug' => 'health'
            ],
            [
                'text' => 'Технологии',
                'slug' => 'hitec'
            ],
            [
                'text' => 'Погода',
                'slug' => 'weather'
            ],
        ];

        DB::table('categories')->insert($category);
    }
}
