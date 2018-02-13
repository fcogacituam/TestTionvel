<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                     ->script(["document.querySelector('#fecha1').value = '2017-10-13' ",]);
            $browser->script(["document.querySelector('#fecha2').value = '2018-03-27' ",]);
            $browser->script(["document.querySelector('#fecha3').value = '2018-04-08' ",]);
            $browser->script(["document.querySelector('#fecha4').value = '2018-05-14' ",]);
            $browser->type('fecha1n','8')
                    ->type('fecha2n','5')
                    ->type('fecha3n','2')
                    ->type('fecha4n','4')
                    ->press("Enviar")
                    ->assertSee("2017-10-23")
                    ->assertSee("2018-04-04")
                    ->assertSee("2018-04-10")
                    ->assertSee("2018-05-18");
        });
    }
}
