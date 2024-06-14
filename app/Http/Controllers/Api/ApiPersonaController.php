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
            'firstName' => $request->firstName,
            'lastName' => $request->lastName
        ]);

        return response()->json($persona);
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
            'firstName' => $request->firstName,
            'lastName' => $request->lastName
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
