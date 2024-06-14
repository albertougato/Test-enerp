<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ route('home') }}" class="text-white hover:text-gray-300">Home</a>
            <a href="{{ route('personas.index') }}" class="ml-4 text-white hover:text-gray-300">Persone</a>
        </div>

        <div>
            <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crea Nuovo Evento</a>
        </div>
    </div>
</nav>
