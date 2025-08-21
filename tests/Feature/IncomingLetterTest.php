<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\IncomingLetter;


class IncomingLetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_and_see_incoming_letter()
    {
        //Arrange
        $user = User::factory()->create();
        $letter = IncomingLetter::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->be($user);

        //Act
        $response = $this->get('/incoming/browse');

        //Assert
        $this->assertDatabaseHas('incoming_letters', [
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('users', [
            'id' => $letter->user_id,
        ]);
        $response->assertStatus(200);
        $response->assertSeeText([
            $letter->id,
            $letter->number,
            $letter->sender,
        ]);
    }
}
