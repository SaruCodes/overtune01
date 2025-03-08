<x-layouts.layout titulo="Overtune - {{ $disco->titulo }}">

<div class="text-center mb-6 mt-12 mx-8">
        <h1 class="text-4xl font-bold text-violet-900">Detalles del Disco</h1>
        <p class="text-xl text-gray-600">Información del disco: <strong>{{$disco->id}}</strong></p>
    </div>

    <!-- Sección de la imagen de portada del disco -->
    <div class="text-center mb-8">
        <img src="{{ asset('storage/' . $disco->cover_image) }}" alt="Portada del Disco" class="mx-auto w-64 h-64 object-cover rounded-lg shadow-md border-4 border-gray-300">
    </div>

    <!-- Detalles adicionales del disco (Artista, Año, Título) debajo de la imagen -->
    <div class="text-center mb-6 mx-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{$disco->titulo}}</h3>
        <p><strong>Artista:</strong> {{$disco->artista}}</p>
        <p><strong>Año de lanzamiento:</strong> {{$disco->anio}}</p>
        <p><strong>Tipo:</strong> {{$disco->tipo}}</p>
    </div>

    <!-- Comprobamos en caso de que no haya géneros asociados -->
    @if($disco->génerosFormatted)
        <div class="space-y-4 mx-8">
            <h2 class="text-3xl font-semibold text-gray-700">Géneros del Disco:</h2>
            @foreach($disco->génerosFormatted as $genero)
                <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg shadow-sm bg-gray-50 mb-4">
                    <div class="flex flex-col">
                        <span class="text-xl font-medium text-gray-800">{{$genero['genero']}}</span>
                        <span class="text-sm text-gray-500">{{$genero['subgenero']}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-4 bg-pink-100 border border-pink-400 rounded-lg mx-8 mb-6">
            <p class="text-lg font-semibold text-pink-800">No hay géneros asociados con este disco.</p>
        </div>
    @endif

</x-layouts.layout>
