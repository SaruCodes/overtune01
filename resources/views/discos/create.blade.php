<x-layouts.layout titulo="Overtune - Nuevo Disco">
    <div class="flex flex-col justify-center items-center min-h-screen bg-violet-100 py-12">
        <!-- Formulario -->
        <form action="{{route('discos.store')}}" method="POST" class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8" enctype="multipart/form-data">
            @csrf

            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Nuevo Disco</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna de Datos -->
                <div class="space-y-6">
                    <div>
                        <x-input-label for="titulo" value="Título" />
                        <x-text-input id="titulo" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="titulo" value="{{ old('titulo') }}" />
                        @error("titulo")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="tipo" value="Tipo" />
                        <x-text-input id="tipo" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="tipo" value="{{ old('tipo') }}" />
                        @error("tipo")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="año" value="Año" />
                        <x-text-input id="año" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="number" name="año" value="{{ old('año') }}" min="1950" />
                        @error("año")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="artista" value="Artista" />
                        <x-text-input id="artista" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="artista" value="{{ old('artista') }}" />
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
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <button type="submit" class="btn btn-sm btn-success px-6 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 focus:outline-none">Guardar</button>
                <a href="{{ route('discos.index') }}" class="btn btn-sm btn-secondary px-6 py-2 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 focus:outline-none">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.layout>
