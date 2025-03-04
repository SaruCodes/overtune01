<x-layouts.layout titulo="Overtune - Nuevo Disco">
    <div class="flex flex-row justify-center items-center min-h-screen bg-gray-300">
        <!-- Session Status -->

        <form action="{{route("discos.store")}}" method="POST">
            @csrf
            <div class="bg-white grid grid-cols-2 gap-4 divide-x-8">
                {{-- Datos --}}
                <div class="bg-white rounded-2xl p-5 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="titulo" value="Título"/>
                        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                                      value="{{ old('titulo') }}"/>
                        @error("titulo")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="tipo" value="Tipo"/>
                        <x-text-input id="tipo" class="block mt-1 w-full" type="text" name="tipo"
                                      value="{{ old('tipo') }}"/>
                        @error("tipo")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="año" value="Año"/>
                        <x-text-input id="año" class="block mt-1 w-full" type="number" name="año"
                                      value="{{ old('año') }}"/>
                        @error("año")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="artista" value="Artista"/>
                        <x-text-input id="artista" class="block mt-1 w-full" type="text" name="artista"
                                      value="{{ old('artista') }}"/>
                        @error("artista")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="max-h-96 overflow-y-auto px-4 text-sm">
                    <h2 class="font-semibold text-lg mb-2">Información adicional</h2>
                </div>

                <div class="p-2">
                    <button class="btn btn-sm btn-success" type="submit">Guardar</button>
                    <a class="btn btn-sm btn-success" href="{{route("discos.index")}}">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</x-layouts.layout>
