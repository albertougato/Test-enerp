<x-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Crea Nuovo Evento</h1>
        
        {{-- create event form --}}
        <form action="{{ route('events.store') }}" method="POST" class="max-w-lg">
            @csrf
            
            {{-- name input --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome dell'Evento</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- date input --}}
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Data dell'Evento</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Crea Evento</button>

            {{-- go back to homepage --}}
            <a href="{{ route('home') }}" class="ml-2 text-blue-500">Annulla</a>
        </form>
    </div>
</x-layout>
