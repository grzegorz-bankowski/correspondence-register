<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;

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

    public function test_admin_can_delete_incoming_letter()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $incoming_letter = IncomingLetter::factory()->create([
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from('/incoming/browse')->delete("/incoming/delete/$incoming_letter->id");

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/incoming/browse');
        $this->followRedirects($response)->assertSeeText('The letter has been deleted!');
        $this->assertDatabaseMissing('incoming_letters', [
            'id' => $incoming_letter->id,
        ]);
    }

    public function test_admin_can_view_incoming_letter_edit_form()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $incoming_letter = IncomingLetter::factory()->create([
            'id' => 6,
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from('/incoming/browse')->get("/incoming/edit/$incoming_letter->id");

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertStatus(200);
    }

    public function test_admin_can_update_incoming_letter()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $incoming_letter = IncomingLetter::factory()->create([
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from("/incoming/edit/$incoming_letter->id")->put("/incoming/update/$incoming_letter->id", [
            'date' => now()->format('Y-m-d'),
            'number' => '123',
            'sender' => 'John Doe',
            'street' => 'Some Street',
            'city' => 'Some City',
            'code' => '21-500',
            'country' => 'United States',
        ]);

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/incoming/browse');
        $this->followRedirects($response)->assertSee('The letter has been updated!');
        $this->assertDatabaseHas('incoming_letters', [
            'id' => $incoming_letter->id,
            'sender' => 'John Doe',
            'street' => 'Some Street',
            'city' => 'Some City',
            'code' => '21-500',
            'country' => 'United States',
        ]);
    }

    public function test_admin_can_delete_outgoing_letter()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $outgoing_letter = OutgoingLetter::factory()->create([
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from('/outgoing/browse')->delete("/outgoing/delete/$outgoing_letter->id");

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/outgoing/browse');
        $this->followRedirects($response)->assertSeeText('The letter has been deleted!');
        $this->assertDatabaseMissing('outgoing_letters', [
            'id' => $outgoing_letter->id,
        ]);
    }

    public function test_admin_can_view_outgoing_letter_edit_form()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $outgoing_letter = OutgoingLetter::factory()->create([
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from('/outgoing/browse')->get("/outgoing/edit/$outgoing_letter->id");

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertStatus(200);
    }

    public function test_admin_can_update_outgoing_letter()
    {
        //Arrange
        $admin = User::factory()->create([
            'admin' => 'yes',
        ]);
        $outgoing_letter = OutgoingLetter::factory()->create([
            'id' => 6,
            'user_id' => $admin->id,
        ]);
        $this->be($admin);

        //Act
        $response = $this->from("/outgoing/edit/$outgoing_letter->id")->put("/outgoing/update/$outgoing_letter->id", [
            'id' => $outgoing_letter->id,
            'date' => now()->format('Y-m-d'),
            'number' => '123',
            'recipient' => 'John Doe',
            'street' => 'Some Street',
            'city' => 'Some City',
            'code' => '21-500',
            'country' => 'United States',
        ]);

        //Assert
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/outgoing/browse');
        $this->followRedirects($response)->assertSee('The letter has been updated!');
        $this->assertDatabaseHas('outgoing_letters', [
            'id' => $outgoing_letter->id,
            'recipient' => 'John Doe',
            'street' => 'Some Street',
            'city' => 'Some City',
            'code' => '21-500',
            'country' => 'United States',
        ]);
    }
}
