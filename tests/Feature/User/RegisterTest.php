<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_register()
    {
        $user = [
            "username"=>"aziz",
            "email"=>"test@mail.com",
            "password"=>"12345",
            "password_confirmation"=>"12345",
            "birthday"=>"02-02-2000",
            "phone"=>"021548755"
        ];
        $response = $this->post('/api/register', $user);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [ 'email' => 'test@mail.com' ]);
    }

}
