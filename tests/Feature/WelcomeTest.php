<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @group example
     */
    public function testWelcomeRouteUnauthorizedTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     *
     * @group example
     */

    public function testWelcomeRouteAuthorizedTest(){
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
