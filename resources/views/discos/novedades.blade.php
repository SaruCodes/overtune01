<x-layouts.layout titulo="Novedades">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center text-violet-950 mb-8">{{__('Últimos Lanzamientos')}}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($discos as $disco)
                <div class="card shadow-lg p-4 bg-white rounded-lg hover:scale-105 hover:shadow-xl transition-transform duration-300 ease-in-out">
                    <!-- Contenedor cuadrado para la imagen -->
                    <div class="relative w-full h-64">
                        <!-- Si no hay imagen, mostramos el placeholder desde public/images/discos/ -->
                        <img class="w-full h-full object-cover rounded-md"
                             src="{{ asset('storage/' . ($disco->cover_image ? $disco->cover_image : 'images/discos/placeholder.jpg')) }}"
                             alt="{{ $disco->titulo }}"
                             onerror="this.onerror=null;this.src='{{ asset('images/discos/placeholder.jpg') }}';">
                    </div>
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold">{{ $disco->titulo }}</h2>
                        <p class="text-gray-600">{{ $disco->artista }}</p>
                        <p class="text-sm text-gray-500">Publicado el {{ $disco->anio }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.layout>
