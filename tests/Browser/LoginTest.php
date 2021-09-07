<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase {

    use DatabaseMigrations;

    /**
     * Check if an authenticated user can log in.
     *
     * @return void
     */
    public function test_auth_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'valid@email.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }

    /**
     * Check if a non-existing user cannot log in.
     *
     * @return void
     */
    public function test_non_existing_user_cannot_login()
    {

        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'nonexisting@email.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertSee('These credentials do not match our records.');
        });

    }
}
