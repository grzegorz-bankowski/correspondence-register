<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\OutgoingLetter;

class OutgoingLetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_and_see_outgoing_letter()
    {
        //Arrange
        $user = User::factory()->create();
        $letter = OutgoingLetter::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->be($user);

        //Act
        $response = $this->get('/outgoing/browse');

        //Assert
        $this->assertDatabaseHas('outgoing_letters', [
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('users', [
            'id' => $letter->user_id,
        ]);
        $response->assertStatus(200);
        $response->assertSeeText([
            $letter->id,
            $letter->number,
            $letter->recipient,
        ]);
    }
}
