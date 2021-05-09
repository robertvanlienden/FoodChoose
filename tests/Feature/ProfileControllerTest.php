<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{

    public function testViewTest()
    {

        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/profile/' . $user->username);
        $response->assertStatus(200);
    }

    public function testUpdateTest()
    {
        $user = User::find(2);

        $this->actingAs($user);

        $response = $this->get('/profile/' . $user->id .'/edit');

        $response->assertStatus(200);
        //todo: update to patch
        $response = $this->call('POST', '/profile/' . $user->id .'/edit', array(
            '_token' => csrf_token(),
            'name' => 'testdone'. rand(0,400),
            'about' => 'Een random ' .rand(0,500) .'aanpassing',
            'url' => 'https://www.test'. rand(0,100).'.nl',
            'username' => 'blah',
//TODO: Fix e-mail and password edit test

//            'email' => ['required',
//                'string',
//                'email',
//                'max:255',
//                'unique:users,email,'. Auth()->user()->id . ',id'],
//            'password' => ['string', 'min:8', 'confirmed'],
        ));

        $this->assertEquals(302, $response->getStatusCode());
    }
}
