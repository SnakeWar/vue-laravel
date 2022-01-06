<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudTodoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test
     */
    public function check_if_create_todo_isCorret()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('text', 'Teste Dusk')
                ->type('date', '2022-01-10')
                ->press('Criar')
                    ->assertStatus(200);
        });
    }
}
