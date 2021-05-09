<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IngredientsControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/ingredients');
        $response->assertStatus(200);
    }

    public function testViewAddtest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/ingredients/add');

        $response = $this->call('POST', '/ingredients/add', array(
            '_token' => csrf_token(),
            'name' => 'Test ' . rand(0, 1000),
        ));
        $this->assertEquals(302, $response->getStatusCode());

    }

    public function testUpdateTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealId = $user->ingredients->first()->id;

        $response = $this->get('/ingredients/' . $mealId);

        $response->assertStatus(200);

        $response = $this->call('PATCH', '/ingredients/' . $mealId, array(
            '_token' => csrf_token(),
            'name' => 'Test ' . rand(0, 1000),
        ));

        $this->assertEquals(302, $response->getStatusCode());

    }

    public function testDeleteTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealId = $user->ingredients->first()->id;
        $response = $this->call('DELETE', '/ingredients/' . $mealId, array(
            '_token' => csrf_token(),
        ));

        $this->assertEquals(302, $response->getStatusCode());

    }
}
