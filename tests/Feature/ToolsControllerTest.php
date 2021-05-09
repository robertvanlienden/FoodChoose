<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ToolsControllerTest extends TestCase
{

    public function testRandommealTest()
    {
        $response = $this->get('/randommeal/');

        $this->assertEquals(302, $response->getStatusCode());

        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/randommeal/');
        $response->assertStatus(200);
    }

    public function testWeekplannerTest()
    {
        $response = $this->get('/weekplanner/');

        $this->assertEquals(302, $response->getStatusCode());

        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/randommeal/');

        $response->assertStatus(200);

    }
}
