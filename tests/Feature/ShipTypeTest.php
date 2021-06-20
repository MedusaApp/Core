<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\ShipType;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_required_for_shiptype_create()
    {
        $response = $this->post('/api/v1/shiptypes', []);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shiptype_details()
    {
        $shiptype = ShipType::where('abbreviation', 'LAC')->first();

        $response = $this->get('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shiptype_delete()
    {
        $shiptype = ShipType::where('abbreviation', 'LAC')->first();

        $response = $this->delete('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shiptype_update()
    {
        $shiptype = ShipType::where('abbreviation', 'LAC')->first();

        $response = $this->put('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertForbidden();
    }

    public function test_member_can_see_shiptypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/shiptypes');

        $response->assertOk();
    }

    public function test_member_cannot_create_shiptypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/shiptypes', []);

        $response->assertForbidden();
    }

    public function test_member_cannot_delete_shiptypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $shiptype = ShipType::where('abbreviation', 'LAC')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertForbidden();
    }

    public function test_member_cannot_update_shiptypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $shiptype = ShipType::where('abbreviation', 'LAC')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertForbidden();
    }

    public function test_admin_can_see_shiptypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/shiptypes');

        $response->assertOk();
    }

    public function test_admin_can_create_shiptypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/shiptypes', [
            'abbreviation' => 'TST',
            'name' => 'Test ShipType',
        ]);

        $response->assertOk();
    }

    public function test_admin_can_delete_shiptypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $shiptype = ShipType::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertOk();
    }

    public function test_admin_can_update_shiptypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $shiptype = ShipType::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/shiptypes/' . $shiptype->id);

        $response->assertOk();
    }
}
