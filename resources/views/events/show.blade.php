<x-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">{{ $event->name }}</h1>
        <p class="mb-4 text-xl">Data: {{ $event->date }}</p>

        {{-- Modify event --}}
        <div class="mt-8">
            <a href="{{ route('events.edit', $event) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Modifica Evento</a>
        </div>


        {{-- participants --}}
        <h2 class="text-xl font-semibold mt-20 mb-2">Partecipanti</h2>

        <ul class="mb-4 w-1/3">
            @foreach ($event->personas as $persona)
                <li class="flex justify-between items-center bg-white p-2 mb-2 rounded shadow">
                    <span>{{ $persona->first_name }} {{ $persona->last_name }}</span>

                    {{-- remove personas --}}
                    <form action="{{ route('events.remove_persona', [$event, $persona]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Rimuovi</button>
                    </form>
                </li>
            @endforeach
        </ul>

        {{-- add personas --}}
        <form action="{{ route('events.add_persona', $event) }}" method="POST">
            @csrf

            <div class="mb-4 w-1/3">
                <label for="persona_id" class="block text-sm font-medium text-gray-700">Aggiungi Persona</label>
                <select name="persona_id" id="persona_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm">
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->first_name }} {{ $persona->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Aggiungi</button>
        </form>

        {{-- go back to homepage --}}
        <a href="{{ route('home') }}" class="text-blue-500">Torna alla lista eventi</a>
    </div>
</x-layout>