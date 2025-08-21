<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_forget_password_form()
    {
        //Arrange

        //Act
        $response = $this->get('/forget');

        //Assert
        $response->assertStatus(200);
    }

    public function test_submit_forget_password_form()
    {
        //Arrange
        $user = User::factory()->create([
            'email' => 'grzegorz@bankowski.dev',
        ]);

        //Act
        $response = $this->from('/forget')->post('/forget', [
            'email' => 'grzegorz@bankowski.dev'
        ]);

        //Assert
        $this->assertDatabaseHas('password_resets', [
            'email' => $user->email,
        ]);
        $response->assertRedirect('/forget');
        $this->followRedirects($response)->assertSeeText('We have sent email with password reset link!');
    }
}
