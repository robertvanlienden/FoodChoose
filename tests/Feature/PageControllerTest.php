<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPagesTest()
    {

        $response = $this->get('/changelog');
        $response->assertStatus(200);

        $response = $this->get('/terms-and-conditions');
        $response->assertStatus(200);
    }
}
