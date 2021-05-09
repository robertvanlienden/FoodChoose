<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ToolsApiControllerTest extends TestCase {

    public function testRandomTest()
    {
        $user = User::find(2);

        $this->actingAs($user, 'api');

        $response = $this->json('GET', '/api/tools/random');

        $response = $response->assertStatus(200);

        $response = $this->json('GET', '/api/tools/random/7');

        $response = $response->assertStatus(200);
    }
}

