<x-layouts.layout>
    <h1>Disco: {{$disco->id}}</h1>
    <h2>Generos del {{$disco->tipo}}</h2>
    <!-- Comprobamos en caso de que no haya generos-->
    @if($disco->genero && $disco->genero->isNotEmpty())
        @foreach($disco->genero as $genero)
            <h2 class="space-x-2">
                <span> {{$genero->genero}}</span>
                <span> {{$genero->subgenero}}</span>
            </h2>
        @endforeach
    @else
        <p>No hay géneros asociados con este disco.</p>
    @endif
</x-layouts.layout>
