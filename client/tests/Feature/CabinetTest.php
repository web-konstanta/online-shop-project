<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CabinetTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private function createUser(): User
    {
        return User::factory()->create();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_successful_access_to_personal_cabinet(): void
    {
        $response = $this->actingAs($this->user)->get('/cabinet');
        $response->assertStatus(200);
    }

    public function test_failed_access_to_personal_cabinet(): void
    {
        $response = $this->get('/cabinet');
        $response->assertStatus(302);
    }
}
