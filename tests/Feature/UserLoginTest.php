<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_login_form()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_user_login_with_correct_credentials()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt($password = 'laravel-password'),
       ]);

        // Act
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert
        $response->assertRedirect('/incoming/add');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_login_with_incorrect_credentials()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt($password = 'laravel-password'),
        ]);

        // Act
        $response = $this->from('/')->post('login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        // Assert
        $response->assertRedirect('/');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_it_cannot_login_if_user_doesnt_exist()
    {
        // Arrange

        // Act
        $response = $this->from('/')->post('login', [
                'email' => 'doesnt-exist-email',
                'password' => 'wrong-password',
            ]);

        // Assert
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('message');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertGuest();
    }

    public function test_it_allows_user_to_logout()
    {
        // Arrange
        $user = User::factory()->create();
        $this->be($user);

        // Act
        $this->assertAuthenticatedAs($user);
        $response = $this->from('/incoming/add')->get('logout');

        // Assert
        $response->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_user_cannot_go_to_admin_section()
    {
        // Arrange
        $user = User::factory()->create();
        $this->be($user);

        // Act
        $response = $this->get('/user/add');

        // Assert
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
        $this->followRedirects($response)->assertSeeText('You must login before go there!');
    }
}
