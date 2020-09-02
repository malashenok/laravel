<?php

namespace Tests\Unit;

use App\{Category, News};
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $this->assertIsArray(News::getNews());
        $this->assertIsArray(News::getNewsById(1));
        $this->assertIsArray(News::getNewsByCategoryId(1));

        $this->assertIsArray(Category::getCategories());
        $this->assertIsArray(Category::getCategoryBySlug('sport'));
        $this->assertIsArray(Category::getCategorySlugById(1));

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Добро пожаловать');

        $response = $this->get('/news/category');


        $response->assertStatus(200);

        $response = $this->get('/admin/create');
        $response->assertStatus(200);

        $response = $this->get('/admin/download');
        $response->assertStatus(200);

    }
}
