<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testTableForm()
    {

        // This test case aims to identify table header after submit button was clicked.
        // This test was created to ensure that appeared data in the table meets user requirement.
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/')
            ->press('Submit')
            ->assertSee('Schedule date & time')
            ->assertSee('Carrier')
            ->assertSee('Flight no')
            ->assertSee('Aircraft type')
            ->assertSee('Gate')
            ->assertSee('Position')
            ->assertSee('Additional resources');
            
        });
    }
}
