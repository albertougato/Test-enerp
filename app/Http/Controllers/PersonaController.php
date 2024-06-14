<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(PersonaRequest $request)
    {
        Persona::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName
        ]);

        return redirect()->route('personas.create');
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(PersonaRequest $request, Persona $persona)
    {
        $persona->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName
        ]);

        return redirect()->route('events.show')->with('message', 'persona modificata con successo');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('events.show')->with('message', 'persona eliminata con successo');
    }
}
