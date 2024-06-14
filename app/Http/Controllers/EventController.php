<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        Event::create([
            'eventName' => $request->eventName,
            'date' => $request->date,
        ]);

        return redirect()->route('home')->with('message', 'Evento creato con successo');
    }

    public function show(Event $event)
    {
        $personas = Persona::whereNull('event_id')->get();

        return view('events.show', compact('event', 'personas'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update([
            'eventName' => $request->eventName,
            'date' => $request->date,
        ]);

        return redirect()->route('events.show')->with('message', 'Evento modificato con successo');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('home')->with('message', 'Evento eliminato con successo');
    }

    //Adding/removing personas to event logic
    public function addPersona(Request $request, Event $event)
    {
        $persona = Persona::findOrFail($request->input('persona_id'));
        $persona->event_id = $event->id;
        $persona->save();

        return redirect()->route('events.show', $event);
    }

    public function removePersona(Event $event, Persona $persona)
    {
        $persona->event_id = null;
        $persona->save();

        return redirect()->route('events.show', $event);
    }
}
