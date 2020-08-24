<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 20)),
                'text' => $faker->realText(rand(100, 255)),
                'category_id' => rand(1, 25),
                'isPrivate' => (bool)rand(0, 1)

            ];
        }
        return $data;
    }
}
