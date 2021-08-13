<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testUserCanCreateAppointment()
    {
        $appointment = [
            'id' => $this->faker->uuid,
            'user_id' => $this->faker->uuid,
            'counsellor_id' => $this->faker->uuid,
            'user_name' => $this->faker->userName,
            'start' => $this->faker->dateTime,
            'end' => $this->faker->dateTime,
            'comments' => $this->faker->text
        ];

        $response = $this->post('/appointments', $appointment);
        $response->assertSessionDoesntHaveErrors();
    }


}
