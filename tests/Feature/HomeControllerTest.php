<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexTest()
    {
        // Test if unauth gets 302 redirect
        $response = $this->get('/home');
        $response->assertStatus(302);

        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
