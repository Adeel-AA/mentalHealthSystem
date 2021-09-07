<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AvailabilityTest extends TestCase {

    use WithFaker;
    use RefreshDatabase;

    public function testUserCanCreateAvailability()
    {
        $availability = [
            'id' => $this->faker->uuid,
            'user_id' => $this->faker->uuid,
            'user_name' => $this->faker->userName,
            'start' => $this->faker->dateTime,
            'end' => $this->faker->dateTime,
        ];

        $response = $this->post('/availability', $availability);
        $response->assertSessionDoesntHaveErrors();
    }


}
