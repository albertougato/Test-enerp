<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPersonaToEventRequest;

class ApiEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'date' => $request->date,
        ]);

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update([
            'name' => $request->name,
            'date' => $request->date,
        ]);

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null);
    }

    //Adding/remoging personas from events
    public function addPersona(AddPersonaToEventRequest $request, Event $event)
    {
        $persona = Persona::findOrFail($request->input('persona_id'));
        $event->personas()->attach($persona);

        return response()->json();
    }

    public function removePersona(Event $event, Persona $persona)
    {
        $event->personas()->detach($persona);

        return response()->json();
    }
}
