<x-layouts.layout titulo="Overtune - Nuevo disco">
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->
        <form action="{{route("discos.update", $disco->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-2xl p-5">
                <div>
                    <x-input-label for="name" value="Nombre"/>
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                  value="{{ $disco->nombre}}"/>
                    @error("nombre")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div>
                    <x-input-label for="tipo" value="Tipo de Formato"/>
                    <x-select id="tipo" class="block mt-1 w-full" name="tipo" required autofocus autocomplete="tipo">
                        <option value="Single" {{ old('tipo', $disco->tipo) == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="EP" {{ old('tipo', $disco->tipo) == 'EP' ? 'selected' : '' }}>EP</option>
                        <option value="Album" {{ old('tipo', $disco->tipo) == 'Album' ? 'selected' : '' }}>Album</option>
                    </x-select>
                    @error("tipo")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>


            </div>
                <div>
                    <x-input-label for="año" value="Año de Publicación" />

                    <x-text-input id="año" class="block mt-1 w-full"
                                  type="number" name="año"
                                  value="{{$disco->f_nac}}"
                                  required autofocus autocomplete="Fecha de nacimiento" />
                    @error("number")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div>
                    <x-input-label for="artista" value="Artista o Grupo" />
                    <x-text-input id="artista" class="block mt-1 w-full"
                                  type="text" name="artista"
                                  value="{{$disco->artista}}"
                                  required autofocus autocomplete="artista"/>
                    @error("dni")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="p-2">
                    <button class= "btn btn-sm btn-success"  type="submit">Guardar </button>
                    <a class= "btn btn-sm btn-success" href="{{route("discos.index")}}">Cancelar</a>
                </div>
            </div>

        </form>
    </div>
</x-layouts.layout>
