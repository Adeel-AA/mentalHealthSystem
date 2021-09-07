<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase {

    use DatabaseMigrations;

    /**
     * A user can be created from a valid email address.
     *
     * @return void
     */
    public function test_user_can_be_created_from_valid_email_address()
    {

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Test User')
                ->type('email', 'valid@email.com')
                ->type('password', 'password123')
                ->type('password_confirmation', 'password123')
                ->press('Register')
                ->assertPathIs('/home');
        });
    }

    /**
     * A user cannot be created from an invalid email address.
     *
     * @return void
     */
    public function test_user_cannot_be_created_from_an_invalid_email_address()
    {

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Test User')
                ->type('email', 'invalid')
                ->type('password', 'password123')
                ->type('password_confirmation', 'password123')
                ->press('Register')
                ->assertInputValueIsNot('email', 'valid@email.com');
        });
    }
}
