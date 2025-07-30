<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_new_user()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $this->be($admin);

        //Act
        $response = $this->post('/user/store', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'Password1234@',
            'admin' => 'yes',
        ]);

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/user/add');
        $this->followRedirects($response)->assertSee('The user account has been created!');
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ]);
    }
}
