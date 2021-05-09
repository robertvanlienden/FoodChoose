<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealCategoriesControllerTest extends TestCase
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

        $response = $this->get('/mealcategories');
        $response->assertStatus(200);
    }

    public function testViewAddtest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/mealcategories/create');

        $response->assertStatus(200);

        $response = $this->call('POST', '/mealcategories/create', array(
            '_token' => csrf_token(),
            'category_name' => 'Test ' . rand(0,1000),
        ));

        $this->assertEquals(302, $response->getStatusCode());

    }

    public function testUpdateTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealCategoryId = $user->mealcategories->first()->id;

        $response = $this->get('/mealcategories/' . $mealCategoryId);

        $response->assertStatus(200);

        $response = $this->call('PATCH', '/mealcategories/' . $mealCategoryId, array(
            '_token' => csrf_token(),
            'category_name' => 'Test ' . rand(0, 1000),
        ));

        $this->assertEquals(302, $response->getStatusCode());

    }

    public function testDeleteTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $mealCategoryId = $user->mealcategories->first()->id;
        $response = $this->call('DELETE', '/mealcategories/' . $mealCategoryId, array(
            '_token' => csrf_token(),
        ));

        $this->assertEquals(302, $response->getStatusCode());

    }

}
