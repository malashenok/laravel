<?php

use App\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{

    public function run()
    {
       factory(News::class, 15)->create();
    }
}
