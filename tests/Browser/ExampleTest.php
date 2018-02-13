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
                    // We use script to type dates
                     ->script(["document.querySelector('#fecha1').value = '2017-10-13' ",]);
                     // the first date is October 10, 2017. The in mail example date
            $browser->script(["document.querySelector('#fecha2').value = '2018-03-27' ",]);
            $browser->script(["document.querySelector('#fecha3').value = '2018-04-08' ",]);
            $browser->script(["document.querySelector('#fecha4').value = '2018-05-14' ",]);
            $browser->type('fecha1n','8')
                    // we add 8 business days to the example date
                    ->type('fecha2n','5')
                    ->type('fecha3n','2')
                    ->type('fecha4n','4')
                    ->press("Enviar")
                    //we send the values by pressing the "Enviar" button
                    ->assertSee("2017-10-23")
                    //if no errors found, we spect to see the date 2017-10-23
                    ->assertSee("2018-04-04")
                    ->assertSee("2018-04-10")
                    ->assertSee("2018-05-18");
        });

        //The next 3 dates are to test the correct functioning of the software
        //We add 5 days to 2018-03-27.. considering that March 30, and March 31 are holiday, and April 1st is Sunday, the correct date must be 2018-04-04
        //We add 2 days to 2018-04-08. the resulting date must be 2018-04-10, because there are not holidays neither sundays between these two dates, also, we start in Sunday for testing
        // we add 4 days to 2018-05-14. We start on Monday, there are not holidays, so, te resulting date must be 2018-05-18.

        // All dates are in order, that is, second date is greater than first date, third date is greater than second date, and fourth date is greather than third date. if we change some date, to break this order, when we run the command "php artisan dusk" we'll receive an error.
    }

}
