<x-layouts.layout titulo="Overtune - Nuevo Disco">
    <div class="flex flex-col justify-center items-center min-h-screen bg-violet-100 py-12">
        <!-- Formulario -->
        <form action="{{ route('discos.store') }}" method="POST" class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8" enctype="multipart/form-data">
            @csrf

            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Nuevo Disco</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna de Datos -->
                <div class="space-y-6">
                    <div>
                        <x-input-label for="titulo" value="Título" />
                        <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{ old('titulo') }}" />
                        @error("titulo")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="tipo" value="Tipo" />
                        <select id="tipo" name="tipo" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Seleccione tipo</option>
                            <option value="Album" {{ old('tipo') == 'Album' ? 'selected' : '' }}>Album</option>
                            <option value="EP" {{ old('tipo') == 'EP' ? 'selected' : '' }}>EP</option>
                            <option value="Single" {{ old('tipo') == 'Single' ? 'selected' : '' }}>Single</option>
                        </select>
                        @error("tipo")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="anio" value="Año" />
                        <x-text-input
                            id="anio"
                            class="block mt-1 w-full"
                            type="number"
                            name="anio"
                            value="{{ old('anio') }}"
                            min="1950"
                            placeholder="1950" />
                        @error("anio")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div>
                        <x-input-label for="artista" value="Artista" />
                        <x-text-input id="artista" class="block mt-1 w-full" type="text" name="artista" value="{{ old('artista') }}" />
                        @error("artista")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Imagen de portada -->
                    <div>
                        <x-input-label for="cover_image" value="Imagen de Portada" />
                        <x-text-input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" />
                        @error("cover_image")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Columna para Géneros y Subgéneros -->
                <div class="max-h-96 overflow-y-auto px-4 text-sm relative">
                    <!-- Encabezado sticky -->
                    <div class="sticky top-0 bg-white z-10">
                        <h2 class="font-semibold text-lg mb-2">Listado de Géneros</h2>
                    </div>
                    <div x-data="{ generos: {} }">
                        @foreach(config('generos') as $genero)
                            <div class="flex items-center gap-3 border-b py-2">
                                <input type="checkbox" name="generos[]" value="{{ $genero }}" x-model="generos['{{ $genero }}']">
                                <label for="genero_{{ $loop->index }}" class="flex-grow">{{ $genero }}</label>
                                <template x-if="generos['{{ $genero }}']">
                                    <div>
                                        <input type="text" name="subgenero[{{ $genero }}]" placeholder="Subgéneros (separados por coma)" class="border rounded text-sm p-1" />
                                    </div>
                                </template>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <button type="submit" class="btn btn-sm btn-success px-6 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 focus:outline-none">
                    Guardar
                </button>
                <a href="{{ route('discos.index') }}" class="btn btn-sm btn-secondary px-6 py-2 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 focus:outline-none">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-layouts.layout>
