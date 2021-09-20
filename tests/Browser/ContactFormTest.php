<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactFormTest extends DuskTestCase
{
    /**
     @test
     */
    public function visitContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Contato');
        });
    }

    public function testIfInputExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                ->assertSee('Nome completo')
                ->assertSee('Email')
                ->assertSee('Mensagem');
        });
    }

    public function testIfContactFormIsWorking()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                ->type('name','Nome completo')
                ->type('email','teste@email.com')
                ->type('message','Teste de mensagem')
                ->press('Enviar mensagem')
                ->assertPathIs('/contato');
                //->assertSee('O contato foi enviado com sucesso!');
        });
    }
}
