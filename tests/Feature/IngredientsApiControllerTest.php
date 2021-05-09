<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IngredientsApiControllerTest extends TestCase {

    public function testGetTest()
    {
        $user = User::find(2);

        $this->actingAs($user, 'api');

        $response = $this->json('GET', '/api/ingredients');

        $response = $response->assertStatus(200);
    }

}

