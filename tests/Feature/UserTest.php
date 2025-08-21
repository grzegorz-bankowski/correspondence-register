<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_login_form()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_view_register_form()
    {
        $response = $this->get('/account');
        $response->assertStatus(200);
    }

    public function test_user_view_add_incoming_letter_form()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('incoming/add');
        $response->assertStatus(200);
    }

    public function test_user_view_add_outgoing_letter_form()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('outgoing/add');
        $response->assertStatus(200);
    }

    public function test_user_view_browse_incoming_letters()
    {
        $user = User::factory()->create();
        $letter = IncomingLetter::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);
        $response = $this->get('incoming/browse');
        $response->assertStatus(200);
        $expectedTexts = [];
        foreach ($letter as $letters) {
            $expectedTexts[] = $letters->id;
            $expectedTexts[] = $letters->number;
            $expectedTexts[] = $letters->sender;
        }
        $response->assertSeeText($expectedTexts);
    }

    public function test_user_view_browse_outgoing_letters()
    {
        $user = User::factory()->create();
        $letter = OutgoingLetter::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);
        $response = $this->get('outgoing/browse');
        $response->assertStatus(200);
        $expectedTexts = [];
        foreach ($letter as $letters) {
            $expectedTexts[] = $letters->id;
            $expectedTexts[] = $letters->number;
            $expectedTexts[] = $letters->sender;
        }
        $response->assertSeeText($expectedTexts);
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
        $this->followRedirects($response)->isNotFound();
    }
}
