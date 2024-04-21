<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormTest extends DuskTestCase
{
    public function test_contact_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/kontakt')
                    ->assertSee('Kontakt')
                    ->type('name', 'Max Mustermann')
                    ->type('email', 'max.mustermann@example.org')
                    ->type('message', 'Hallo! Dies ist eine Testnachricht.')
                    ->press('Nachricht absenden')
                    ->assertSee('Ihre Anfrage wurde erfolgreich übermittelt.');
        });
        session()->flush();
    }

    public function test_membership_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/verein/mitgliedschaft')
                ->assertSee('Mitgliedschaft')
                ->type('first_name', 'Max')
                ->type('last_name', 'Mustermann')
                ->type('street', 'Musterstraße 1')
                ->type('zip', '12345')
                ->type('city', 'Musterort')
                ->type('email', 'max.mustermann@example.org')
                ->type('phone', '12345 123456789')
                ->type('instrument', 'Tenorhorn')
                ->type('birthday', '1990-01-01')
                ->type('anniversary', '2020-05-05')
                ->type('iban', 'DE12')
                ->type('bic', 'NASSDE')
                ->type('bank_account_owner', 'Max Mustermann')
                ->press('Mitgliedschaftsformular absenden')
                ->assertSee('Dieses Feld muss eine gültige IBAN')
                ->assertSee('Dieses Feld muss einen gültigen BIC')
                ->type('iban', 'DE12500105170648489890')
                ->type('bic', 'INGDDEFFXXX')
                ->press('Mitgliedschaftsformular absenden')
                ->assertSee('Ihre Anfrage wurde erfolgreich übermittelt.');
        });
        session()->flush();
    }
}
