<?php

namespace mswco\User\Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use mswco\User\Models\User;
class LoginTest extends TestCase
{
use WithFaker;
use RefreshDatabase;

    public function test_show_login_form(){
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

        public function test_user_can_login(){
        $user = User::create([
    'name' => $this->faker()->name,
    'email' => $this->faker()->email,
    'password' => bcrypt('M21232123m?@')
        ]);

        $this->post(route('login'),[
        'email' => $user->email,
        'password' => 'M21232123m?@',
        ]);

        $this->assertAuthenticated();
    }




}
