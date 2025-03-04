<x-layouts.layout>
    <h1>Alumno : {{$disco->id}}</h1>
    <h2>Idiomas que habla</h2>
    @foreach($disco->genero as $genero)
        <h2 class="space-x-2">
            <span> {{$genero->genero}}</span>
            <span> {{$idioma->nivel}}</span>
            <span> {{$idioma->titulo}}</span>
        </h2>
    @endforeach
</x-layouts.layout>
