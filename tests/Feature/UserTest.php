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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanBeCreatedFromValidEmailAddress()
    {

        $user = User::factory()->make();

        $this->assertInstanceOf(User::class, $user);
    }

    public function testUserCannotBeCreatedFromInvalidEmailAddress()
    {

        $user = [
            'name' => $this->faker->name,
            'email' => 'invalid',
            'password' => $this->faker->password
        ];

        $response = $this->post('/register', $user);
        $response->assertSessionHasErrors('email');
    }


}
