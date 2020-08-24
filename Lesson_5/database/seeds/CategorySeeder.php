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
        DB::table('category')->insert($this->getData());
    }

    private function getData()
    {
        $categories = [];

        $faker_ru = Faker\Factory::create('ru_RU');
        $faker_en = Faker\Factory::create('en_EN');

        for ($i = 0; $i < 25; $i++) {
            $categories[] = [

                'text' => preg_replace('/[\.!+-]/', '',
                                        str_replace(' ', '', $faker_ru->realText(rand(10, 15)))),
                'slug' => preg_replace('/[^A-Za-z0-9\-]/', '',
                                        str_replace(' ', '', $faker_en->realText(rand(10, 15)))),
            ];
        }
            return $categories;
    }
}
