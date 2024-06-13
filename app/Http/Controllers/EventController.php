<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        Event::create($validatedData);

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

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.edit')->with('message', 'Evento modificato con successo');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('home')->with('message', 'Evento eliminato con successo');
    }
}
