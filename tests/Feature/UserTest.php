<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;


    public function testUserCanBeCreatedFromValidEmailAddress()
    {
//        $user = User::factory()->make();

        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect('/home');
    }

    public function testUserCannotBeCreatedFromInvalidEmailAddress()
    {
        $user = [
            'name' => $this->faker->name,
            'email' => 'invalid',
            'password' => $this->faker->password
        ];

        $response = $this->post('/register', $user);
        $response->assertSessionHasErrorsIn('email');
    }

    public function testUserPasswordInsufficientLengthOnRegistration()
    {
        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'short'
        ];

        $response = $this->post('/register', $user);
        $response->assertSessionHasErrorsIn('password');

    }

    public function testUserPasswordDoesNotMatchOnRegistration()
    {
        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password123',
            'password_confirmation' => 'password321'
        ];

        $response = $this->post('/register', $user);
        $response->assertSessionHasErrorsIn('password');

    }

    public function testUserCanLogIn()
    {
        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $this->post('/register', $user);

        $response = $this->post('/login', $user);

        $response->assertRedirect('/home');

    }

    public function testNonExistingUserCannotLogIn()
    {
        $user = [
            'email' => $this->faker->email,
            'password' => 'password123',
        ];


        $response = $this->post('/login', $user);

        $response->assertSessionHasErrorsIn('email password');

    }


}
