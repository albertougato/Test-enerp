<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        Persona::create($validatedData);

        return redirect()->route('personas.create');
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $persona->update($validatedData);

        return redirect()->route('events.index');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('events.index');
    }
}
