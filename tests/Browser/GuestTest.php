<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GuestTest extends DuskTestCase
{
    /**
     * Тест переходов для гостя.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('Регистрация')->assertSee('Вход');
            $browser->clickLink('Регистрация')->waitForLocation('/register');
            $browser->clickLink('Вход')->waitForLocation('/auth');
        });
    }
}
