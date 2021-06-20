<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\ChapterType;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChapterTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_required_for_chaptertype_create()
    {
        $response = $this->post('/api/v1/chaptertypes', []);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chaptertype_details()
    {
        $chaptertype = ChapterType::where('name', 'Training Center')->first();

        $response = $this->get('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chaptertype_delete()
    {
        $chaptertype = ChapterType::where('name', 'Training Center')->first();

        $response = $this->delete('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chaptertype_update()
    {
        $chaptertype = ChapterType::where('name', 'Training Center')->first();

        $response = $this->put('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertForbidden();
    }

    public function test_member_can_see_chaptertypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/chaptertypes');

        $response->assertOk();
    }

    public function test_member_cannot_create_chaptertypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/chaptertypes', []);

        $response->assertForbidden();
    }

    public function test_member_cannot_delete_chaptertypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $chaptertype = ChapterType::where('name', 'Training Center')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertForbidden();
    }

    public function test_member_cannot_update_chaptertypes()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $chaptertype = ChapterType::where('name', 'Training Center')->first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertForbidden();
    }

    public function test_admin_can_see_chaptertypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/chaptertypes');

        $response->assertOk();
    }

    public function test_admin_can_create_chaptertypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/chaptertypes', [
            'slug' => 'test_chaptertype',
            'name' => 'Test ChapterType',
            'has_command_triad' => true,
        ]);

        $response->assertOk();
    }

    public function test_admin_can_delete_chaptertypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $chaptertype = ChapterType::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/chaptertypes/' . $chaptertype->id);

        $response->assertOk();
    }

    public function test_admin_can_update_chaptertypes()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $chaptertype = ChapterType::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/chaptertypes/' . $chaptertype->id, [
            'name' => $chaptertype->name,
            'slug' => $chaptertype->slug,
            'has_command_triad' => false,
        ]);

        $response->assertOk();
    }
}
