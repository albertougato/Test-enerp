<x-layout>
    <div class="container mx-auto">

        @if (session('message'))
        <div class="bg-green-200 text-green-900 px-4 py-2 mb-4">
            {{ session('message') }}
        </div>
    @endif

        <h1 class="text-2xl font-bold mb-4">Lista delle Persone</h1>
        
        {{-- new persona --}}
        <a href="{{ route('personas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crea Nuova Persona</a>
        
        {{-- personas list --}}
        <div class="mt-6">
            @foreach ($personas as $persona)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $persona->first_name }} {{ $persona->last_name }}</h2>
                    <a href="{{ route('personas.edit', $persona) }}" class="text-blue-500">Modifica</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>