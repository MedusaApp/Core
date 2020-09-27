<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_login_required_for_user_details()
    {
        $user = User::factory()->create();

        $response = $this->get('/api/v1/users/' . $user->id);

        $response->assertForbidden();
    }

    public function test_user_can_see_their_details()
    {
        $user = User::factory()->create();

        Sanctum::actingAs(
            $user,
            ['*']
        );

        $response = $this->get('/api/v1/users/' . $user->id);

        $response->assertOk();
    }
}
