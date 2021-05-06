<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    /**
     * Тест на возможность администратора редактировать темы уроков
     *
     * @return void
     */
    public function testAdminCanEditLessons()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Вход')
                ->type('login', 'admin')
                ->type('password', 'admin')
                ->press('Войти')
                ->assertSee('Добро пожаловать, Администратор');
            $browser->clickLink('Управление темами')
                ->assertSee('Управление темами')
                ->assertSee('Добавить')
                ->assertSee('Удалить тему');
            $browser->screenshot('adminCanEditLessons');
        });
    }
}
