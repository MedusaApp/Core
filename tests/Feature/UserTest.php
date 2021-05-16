<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_login_required_for_user_create()
    {
        $response = $this->post('/api/v1/users');

        $response->assertForbidden();
    }

    public function test_user_login_required_for_user_details()
    {
        $user = User::factory()->create();

        $response = $this->get('/api/v1/users/' . $user->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_user_update()
    {
        $user = User::factory()->create();

        $response = $this->put('/api/v1/users/' . $user->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_user_delete()
    {
        $user = User::factory()->create();

        $response = $this->delete('/api/v1/users/' . $user->id);

        $response->assertForbidden();
    }

    public function test_user_can_see_their_details()
    {
        $user = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/users/' . $user->id);

        $response->assertOk();
    }

    public function test_user_cannot_create_user()
    {
        $user = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/users');

        $response->assertForbidden();
    }

    public function test_user_cannot_see_other_user()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/users/' . $user2->id);

        $response->assertForbidden();
    }

    public function test_user_cannot_delete_other_user()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/users/' . $user2->id);

        $response->assertForbidden();
    }

    public function test_user_cannot_update_other_user()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/users/' . $user2->id);

        $response->assertForbidden();
    }

    public function test_user_with_admin_role_can_create_user()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $user = User::factory()->create();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/users', [
            'password' => '1234abcd',
            'email' => 'junktest@example.com',
            'first_name' => 'Junk',
            'last_name' => 'Test',
            'date_of_birth' => '1980-01-01',
        ]);

        $response->assertOk();
    }

    public function test_user_with_admin_role_can_see_other_user()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $user = User::factory()->create();
        $user->roles()->attach($adminRole);
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/users/' . $user2->id);

        $response->assertOk();
    }

    public function test_user_with_admin_role_can_delete_other_user()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $user = User::factory()->create();
        $user->roles()->attach($adminRole);
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/users/' . $user2->id);

        $response->assertOk();
    }

    public function test_user_with_admin_role_can_update_other_user()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $user = User::factory()->create();
        $user->roles()->attach($adminRole);
        $user2 = User::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/users/' . $user2->id);

        $response->assertOk();
    }
}
