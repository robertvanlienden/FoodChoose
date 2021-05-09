<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealsApiControllerTest extends TestCase {

    public function testGetTest()
    {
        $user = User::find(2);

        $this->actingAs($user, 'api');

        $response = $this->json('GET', '/api/meals');

        $response = $response->assertStatus(200);
    }

    public function testViewTest()
    {
        $user = User::find(2);

        $this->actingAs($user, 'api');

        $mealId = $user->meals->first()->id;

        $response = $this->json('GET', '/api/meals/' . $mealId);

        $response = $response
            ->assertStatus(200);
    }
}

