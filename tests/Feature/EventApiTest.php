<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Persona;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventApiTest extends TestCase
{
    use RefreshDatabase;

    // event creation
    public function test_can_create_event()
    {
        $response = $this->postJson('/api/events', [
            'name' => 'Test Event',
            'date' => '2024-06-15'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('events', [
            'name' => 'Test Event',
            'date' => '2024-06-15'
        ]);
    }

    //event show
    public function test_can_show_event()
    {
        $event = Event::factory()->create();

        $response = $this->getJson('/api/events/' . $event->id);

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $event->id,
            'name' => $event->name,
            'date' => $event->date
        ]);
    }

    //event update
    public function test_can_update_event()
    {
        $event = Event::factory()->create();

        $response = $this->putJson('/api/events/' . $event->id, [
            'name' => 'Updated Event',
            'date' => '2024-07-01'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'name' => 'Updated Event',
            'date' => '2024-07-01',
        ]);
    }

    //event delete
    public function test_can_delete_event()
    {
        $event = Event::factory()->create();

        $response = $this->deleteJson('/api/events/' . $event->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('events', [
            'id' => $event->id
        ]);
    }

    //add personas
    public function test_can_add_persona_to_event()
    {
        $event = Event::factory()->create();
        $persona = Persona::factory()->create();

        $response = $this->postJson('/api/events/' . $event->id . '/add-persona', [
            'persona_id' => $persona->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('personas', [
            'id' => $persona->id,
            'event_id' => $event->id,
        ]);
    }

    //remove personas
    public function test_can_remove_persona_from_event()
    {
        $event = Event::factory()->create();
        $persona = Persona::factory()->create(['event_id' => $event->id]);

        $response = $this->deleteJson('/api/events/' . $event->id . '/remove-persona/' . $persona->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('personas', [
            'id' => $persona->id,
            'event_id' => $event->id,
        ]);
    }
}
