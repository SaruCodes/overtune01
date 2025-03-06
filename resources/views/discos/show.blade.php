<x-layouts.layout>
    <!-- Título principal con margen superior más grande y márgenes laterales amplios -->
    <div class="text-center mb-6 mt-12 mx-8">
        <h1 class="text-4xl font-bold text-violet-900">Detalles del Disco</h1>
        <p class="text-xl text-gray-600">Información del disco: <strong>{{$disco->id}}</strong></p>
    </div>

    <!-- Título del tipo de disco con margen superior y márgenes laterales ampliados -->
    <div class="text-center mb-4 mx-8">
        <h2 class="text-3xl font-semibold text-gray-700">Géneros del Disco: <span class="italic">{{$disco->tipo}}</span></h2>
    </div>

    <!-- Comprobamos en caso de que no haya géneros -->
    @if($disco->genero && $disco->genero->isNotEmpty())
        <div class="space-y-4 mx-8">
            @foreach($disco->genero as $genero)
                <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg shadow-sm bg-gray-50 mb-4">
                    <div class="flex flex-col">
                        <span class="text-xl font-medium text-gray-800">{{$genero->genero}}</span>
                        <span class="text-sm text-gray-500">{{$genero->subgenero}}</span>
                    </div>
                    <div class="text-sm text-gray-600">Generado por: {{$genero->created_at->format('d/m/Y')}}</div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-4 bg-pink-100 border border-pink-400 rounded-lg mx-8 mb-6">
            <p class="text-lg font-semibold text-pink-800">No hay géneros asociados con este disco.</p>
        </div>
    @endif
</x-layouts.layout>
