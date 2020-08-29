<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    //запуск миграций
    use RefreshDatabase;


    public function testBasicExample()
    {
       $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Добро пожаловать');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '1')
                ->press('Добавить')
                ->assertSee('Количество символов');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/edit/1')
                ->type('title', 'covid')
                ->press('Изменить')
                ->assertSee('не разрешены');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('slug', 'test_slug')
                ->type('text', 'test_text')
                ->press('Добавить')
                ->assertSee('добавлена успешно');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/1/edit')
                ->type('slug', '1')
                ->press('Изменить')
                ->assertSee('Количество символов');
        });
    }
}
