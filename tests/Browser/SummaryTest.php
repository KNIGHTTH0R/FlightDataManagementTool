<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SummaryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCarrierTableForm()
    {
        // This test case aims to identify table header after submit button was clicked.
        // This specify table from that group by carrier.
         // This test was created to ensure that appeared data in the table meets user requirement. 
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/summary')
            ->radio('summary_type', 'Carrier')
            ->press('Submit')
                    ->assertSee('Carrier')
                    ->assertSee('Sunday')
                    ->assertSee('Monday')
                    ->assertSee('Tuesday')
                    ->assertSee('Wednesday')
                    ->assertSee('Thursday')
                    ->assertSee('Friday')
                    ->assertSee('Saturday');
                    
        });
    }


    public function testAircraftTableForm()
    {
        // This test case aims to identify table header after submit button was clicked.
        // This specify table from that group by Aircraft type.
         // This test was created to ensure that appeared data in the table meets user requirement.
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/summary')
            ->radio('summary_type', 'Aircraft_type')
            ->press('Submit')
                    ->assertSee('Aircraft type')
                    ->assertSee('Sunday')
                    ->assertSee('Monday')
                    ->assertSee('Tuesday')
                    ->assertSee('Wednesday')
                    ->assertSee('Thursday')
                    ->assertSee('Friday')
                    ->assertSee('Saturday');
                    
        });
    }


    public function testCarrierAircraftTableForm()
    {
        // This test case aims to identify table header after submit button was clicked.
        // This specify table from that group by Carrier and Aircraft type.
         // This test was created to ensure that appeared data in the table meets user requirement.
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/summary')
            ->radio('summary_type', 'Carrier_Aircraft_type')
            ->press('Submit')
                    ->assertSee('Carrier')
                    ->assertSee('Aircraft type')
                    ->assertSee('Sunday')
                    ->assertSee('Monday')
                    ->assertSee('Tuesday')
                    ->assertSee('Wednesday')
                    ->assertSee('Thursday')
                    ->assertSee('Friday')
                    ->assertSee('Saturday');
                    
        });
    }


    public function testWeekdayCarrierTableForm()
    {
        // This test case aims to identify table header after submit button was clicked.
        // This specify table from that group by Weekday and Carrier.
         // This test was created to ensure that appeared data in the table meets user requirement.
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/summary')
            ->radio('summary_type', 'Weekday_Carrier')
            ->press('Submit')
                    ->assertSee('Weekday')
                    ->assertSee('00')
                    ->assertSee('01')
                    ->assertSee('02')
                    ->assertSee('03')
                    ->assertSee('04')
                    ->assertSee('05')
                    ->assertSee('06')
                    ->assertSee('07')
                    ->assertSee('08')
                    ->assertSee('09')
                    ->assertSee('10')
                    ->assertSee('11')
                    ->assertSee('12')
                    ->assertSee('13')
                    ->assertSee('14')
                    ->assertSee('15')
                    ->assertSee('16')
                    ->assertSee('17')
                    ->assertSee('18')
                    ->assertSee('19')
                    ->assertSee('20')
                    ->assertSee('21')
                    ->assertSee('22')
                    ->assertSee('23');
                    
        });
    }
}
