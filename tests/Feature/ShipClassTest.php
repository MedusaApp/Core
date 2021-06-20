<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\ShipClass;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipClassTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_required_for_shipclass_create()
    {
        $response = $this->post('/api/v1/shipclasses', []);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shipclass_details()
    {
        $shipclass = ShipClass::where('name', 'Condor')->first();

        $response = $this->get('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shipclass_delete()
    {
        $shipclass = ShipClass::where('name', 'Condor')->first();

        $response = $this->delete('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_shipclass_update()
    {
        $shipclass = ShipClass::where('name', 'Condor')->first();

        $response = $this->put('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertForbidden();
    }

    public function test_member_can_see_shipclasses()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/shipclasses');

        $response->assertOk();
    }

    public function test_member_cannot_create_shipclasses()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/shipclasses', []);

        $response->assertForbidden();
    }

    public function test_member_cannot_delete_shipclasses()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $shipclass = ShipClass::where('name', 'Condor')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertForbidden();
    }

    public function test_member_cannot_update_shipclasses()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $shipclass = ShipClass::where('name', 'Condor')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertForbidden();
    }

    public function test_admin_can_see_shipclasses()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/shipclasses');

        $response->assertOk();
    }

    public function test_admin_can_create_shipclasses()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/shipclasses', [
            'name' => 'Test ShipClass',
            'ship_type_id' => 1,
            'type_order' => 0,
            'crew_max' => 5,
            'crew_min' => 1,
            'officer_min' => 1,
        ]);

        $response->assertOk();
    }

    public function test_admin_can_delete_shipclasses()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $shipclass = ShipClass::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertOk();
    }

    public function test_admin_can_update_shipclasses()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $shipclass = ShipClass::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/shipclasses/' . $shipclass->id);

        $response->assertOk();
    }
}
