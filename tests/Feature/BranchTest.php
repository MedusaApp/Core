<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Branch;
use App\Models\User;
use Tests\TestCase;

class BranchTest extends TestCase
{
    public function test_user_login_required_for_branch_create()
    {
        $response = $this->post('/api/v1/branches', []);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_branch_details()
    {
        $branch = Branch::where('abbreviation', 'RMN')->first();

        $response = $this->get('/api/v1/branches/' . $branch->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_branch_delete()
    {
        $branch = Branch::where('abbreviation', 'RMN')->first();

        $response = $this->delete('/api/v1/branches/' . $branch->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_branch_update()
    {
        $branch = Branch::where('abbreviation', 'RMN')->first();

        $response = $this->put('/api/v1/branches/' . $branch->id);

        $response->assertForbidden();
    }

    public function test_member_can_see_branches()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/branches');

        $response->assertOk();
    }

    public function test_member_cannot_create_branches()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/branches', []);

        $response->assertForbidden();
    }

    public function test_member_cannot_delete_branches()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $branch = Branch::where('abbreviation', 'RMN')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/branches/' . $branch->id);

        $response->assertForbidden();
    }

    public function test_member_cannot_update_branches()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $branch = Branch::where('abbreviation', 'RMN')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/branches/' . $branch->id);

        $response->assertForbidden();
    }

    public function test_admin_can_see_branches()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/branches');

        $response->assertOk();
    }

    public function test_admin_can_create_branches()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/branches', [
            'abbreviation' => 'TST',
            'name' => 'Test Branch',
            'is_civilian' => false,
        ]);

        $response->assertOk();
    }

    public function test_admin_can_delete_branches()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $branch = Branch::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/branches/' . $branch->id);

        $response->assertOk();
    }

    public function test_admin_can_update_branches()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $branch = Branch::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/branches/' . $branch->id);

        $response->assertOk();
    }
}
