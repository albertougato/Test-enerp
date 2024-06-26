<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonaRequest;
use App\Models\Persona;

class ApiPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Persona::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonaRequest $request)
    {
        $persona = Persona::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return response()->json($persona, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return $persona;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonaRequest $request, Persona $persona)
    {
        $persona->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return response()->json($persona);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return response()->json(null);
    }
}
