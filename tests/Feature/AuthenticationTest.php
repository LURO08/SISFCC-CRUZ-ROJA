<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertAuthenticated();

        // Check the redirection based on the user's role
        $role = $user->roles->pluck('name')->first();
        switch ($role) {
            case 'admin':
                $response->assertRedirect(route('admin'));;
                break;
            case 'doctor':
                $response->assertRedirect(route('doctor'));
                break;
            case 'cajero':
                $response->assertRedirect(route('cajero'));
                break;
            case 'farmacia':
                $$response->assertRedirect(route('farmacia'));
                break;
            default:
                $response->assertRedirect(route('dashboard'));
                break;
        }
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
