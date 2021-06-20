<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Chapter;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChapterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_required_for_chapter_create()
    {
        $response = $this->post('/api/v1/chapters', []);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chapter_details()
    {
        $chapter = Chapter::first();

        $response = $this->get('/api/v1/chapters/' . $chapter->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chapter_delete()
    {
        $chapter = Chapter::first();

        $response = $this->delete('/api/v1/chapters/' . $chapter->id);

        $response->assertForbidden();
    }

    public function test_user_login_required_for_chapter_update()
    {
        $chapter = Chapter::first();

        $response = $this->put('/api/v1/chapters/' . $chapter->id);

        $response->assertForbidden();
    }

    public function test_member_can_see_chapters()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/chapters');

        $response->assertOk();
    }

    public function test_member_cannot_create_chapters()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/chapters', []);

        $response->assertForbidden();
    }

    public function test_member_cannot_delete_chapters()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $chapter = Chapter::first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/chapters/' . $chapter->id);

        $response->assertForbidden();
    }

    public function test_member_cannot_update_chapters()
    {
        $user = User::factory()->create();
        $memberRole = Role::where('slug', 'member')->first();
        $user->roles()->attach($memberRole);

        $chapter = Chapter::first();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/chapters/' . $chapter->id);

        $response->assertForbidden();
    }

    public function test_admin_can_see_chapters()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->get('/api/v1/chapters');

        $response->assertOk();
    }

    public function test_admin_can_create_chapters()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->post('/api/v1/chapters', [
            'name' => 'Test Chapter',
            'hull_number' => '1110111',
            'is_joinable' => true,
            'is_active' => true,
            'branch_id' => 1,
            'ship_class_id' => 1,
            'chapter_type_id' => 1,
            'commission_date' => date('Y-m-d'),
        ]);

        $response->assertOk();
    }

    public function test_admin_can_delete_chapters()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $chapter = Chapter::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->delete('/api/v1/chapters/' . $chapter->id);

        $response->assertOk();
    }

    public function test_admin_can_update_chapters()
    {
        $user = User::factory()->create();
        $adminRole = Role::where('slug', 'admin')->first();
        $user->roles()->attach($adminRole);

        $chapter = Chapter::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => "bearer $token",
        ])->put('/api/v1/chapters/' . $chapter->id, [
            'name' => 'Test Chapter',
            'hull_number' => '1110111',
            'is_joinable' => true,
            'is_active' => true,
            'branch_id' => 1,
            'ship_class_id' => 1,
            'chapter_type_id' => 1,
            'commission_date' => date('Y-m-d'),
        ]);

        $response->assertOk();
    }
}
