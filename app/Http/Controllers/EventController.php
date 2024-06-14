<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return view('events.show', compact('event'));
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
}
