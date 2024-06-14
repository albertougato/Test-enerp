<x-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Modifica Evento</h1>

        {{-- edit form --}}
        <form action="{{ route('events.update', $event) }}" method="POST" class="max-w-lg">
            @csrf
            @method('PUT')

            {{-- edit name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome dell'Evento</label>
                <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- edit date --}}
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Data dell'Evento</label>
                <input type="date" name="date" id="date"
                    value="{{ old('date', $event->date) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- save cancel changes --}}
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salva Modifiche</button>
            <a href="{{ route('home') }}" class="ml-2 text-blue-500">Annulla</a>
        </form>

        {{-- delete event --}}
        <form action="{{ route('events.destroy', $event) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                onclick="return confirm('Sei sicuro di voler eliminare questo evento?')">Elimina Evento</button>
        </form>
    </div>
</x-layout>
