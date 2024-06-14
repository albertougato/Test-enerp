<x-layout>
    <div class="container mx-auto">

        @if (session('message'))
            <div class="bg-green-200 text-green-900 px-4 py-2 mb-4">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Crea Nuova Persona</h1>

        {{-- new persona form --}}
        <form action="{{ route('personas.store') }}" method="POST" class="max-w-lg">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('first_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- last name --}}
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Cognome</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('last_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- confirm cancel --}}
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Crea Persona</button>
            <a href="{{ route('personas.index') }}" class="ml-2 text-blue-500">Annulla</a>
        </form>
    </div>
</x-layout>
