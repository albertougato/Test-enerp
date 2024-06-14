<x-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Modifica Persona</h1>

        {{-- edit form --}}
        <form action="{{ route('personas.update', $persona) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- name edit --}}
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="first_name" id="first_name" value="{{ $persona->first_name }}"
                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm">
            </div>

            {{-- last name edit --}}
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Cognome</label>
                <input type="text" name="last_name" id="last_name" value="{{ $persona->last_name }}"
                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salva</button>
        </form>

        {{-- delete form --}}
        <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Elimina</button>
        </form>

        {{-- go back to personas index --}}
        <a href="{{ route('personas.index') }}" class="text-blue-500">Torna alla lista persone</a>
    </div>
</x-layout>
