<?php

namespace Tests\Feature;

use App\Meal;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class MealsControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testIndexTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/meals');
        $response->assertStatus(200);


        $response = $this->get('/meals?sort_by=preparation_time&sort_type=asc');
        $response->assertStatus(200);

        $response = $this->get('/meals?sort_by=preparation_time&sort_type=desc');
        $response->assertStatus(200);

        $response = $this->get('/meals?sort_by=meal_name&sort_type=asc');
        $response->assertStatus(200);

        $response = $this->get('/meals?sort_by=meal_name&sort_type=desc');
        $response->assertStatus(200);

        $response = $this->get('/meals/?search_input=Input&search_on=meal_name');
        $response->assertStatus(200);

        $response = $this->get('/meals/?search_input=Input&search_on=category_name');
        $response->assertStatus(200);

    }

    public function testAddTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/meals/add');

        $response->assertStatus(200);

        $response = $this->call('POST', '/meals/add', array(
            '_token' => csrf_token(),
            'meal_name' => 'Test ' . rand(0,1000),
            'directions' => 'Aanwijzingen',
            'preparation_time' => rand(0,60),
            'recipe_url' => 'https://google.nl',
            'public' => 0,
        ));
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testUpdateTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealId = $user->meals->first()->id;

        $response = $this->get('/meals/' . $mealId);

        $response->assertStatus(200);

        $response = $this->call('PATCH', '/meals/'. $mealId, array(
            '_token' => csrf_token(),
            'meal_name' => 'Test ' . rand(0,1000),
            'directions' => 'Aangepast',
            'preparation_time' => rand(5, 60),
            'recipe_url' => 'https://editted.nl',
            'public' => 0,
        ));

        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testViewTest()
    {
        $user = User::find(2);

        //Unauth view
        $response = $this->get('/meals/view/' . $user->meals->first()->id);

        $response->assertStatus(403);

        //Auth view

        $this->actingAs($user);

        $mealId = $user->meals->first()->id;

        $response = $this->get('/meals/view/' . $mealId);

        $response->assertStatus(200);

    }

    public function testDeleteTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealId = $user->meals->first()->id;

        $response = $this->call('DELETE', '/meals/'. $mealId, ['_token' => csrf_token()]);

        $response->assertStatus(302);

    }

}
