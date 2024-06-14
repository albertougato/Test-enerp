<x-layout>
    <div class="container mx-auto">
        <h1 class="text-6xl font-extrabold m-8 text-center text-gray-800">Event Management</h1>
        <h2 class="text-2xl font-bold mt-20 mb-4">Lista degli Eventi</h2>

        
        {{-- event list --}}
        <div class="mt-6">
            @foreach ($events as $event)
                <div class="bg-white p-4 mb-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $event->name }}</h2>
                    <p>{{ $event->date }}</p>
                    <a href="{{ route('events.show', $event) }}" class="text-blue-500">Dettagli</a>
                    </div>
            @endforeach
        </div>
    </div>
</x-layout>
