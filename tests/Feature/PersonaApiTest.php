<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Persona;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonaApiTest extends TestCase
{
    use RefreshDatabase;

    // persona creation
    public function test_can_create_persona()
    {
        $response = $this->postJson('/api/personas', [
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('personas', [
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);
    }

    // show persona
    public function test_can_show_persona()
    {
        $persona = Persona::factory()->create();

        $response = $this->getJson('/api/personas/' . $persona->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $persona->id,
            'first_name' => $persona->first_name,
            'last_name' => $persona->last_name,
        ]);
    }

    //persona update
    public function test_can_update_persona()
    {
        $persona = Persona::factory()->create();

        $response = $this->putJson('/api/personas/' . $persona->id, [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('personas', [
            'id' => $persona->id,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
        ]);
    }

    //delete persona
    public function test_can_delete_persona()
    {
        $persona = Persona::factory()->create();

        $response = $this->deleteJson('/api/personas/' . $persona->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('personas', [
            'id' => $persona->id,
        ]);
    }
}
