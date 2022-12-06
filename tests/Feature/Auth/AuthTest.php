<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    //use RefreshDatabase;

    public function test_user_can_login_successfully()
    {
        $user =  User::factory()->create();
        $res = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $res->assertStatus(200);

        $this->assertAuthenticatedAs($user);

    }

    public function test_user_can_not_login_with_wrong_password()
    {
        $user =  User::factory()->create();
        $res = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'wrong_password'
        ]);
        $res->assertStatus(422);
    }

    public function test_user_can_not_login_with_wrong_email()
    {
        $user =  User::factory()->create();
        $res = $this->postJson('/api/login', [
            'email' => 'wrong_email',
            'password' => 'password'
        ]);
        $res->assertStatus(422);
    }
    public function test_user_token()
    {
        $user = User::factory()->create();
        $res  = $this->postJson('/api/login', [
            'email'    => $user->email,
            'password' => 'password'
        ]);
        $res->assertStatus(200);
        $this->assertArrayHasKey('token', $res->json());
    }

}
