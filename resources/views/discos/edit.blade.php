<x-layouts.layout titulo="Overtune - Nuevo Disco">
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Disco</h1>
            <form action="{{ route('discos.update', $disco->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="space-y-4">
                    <!-- Nombre -->
                    <div>
                        <x-input-label for="nombre" value="Nombre del Disco" />
                        <x-text-input
                            id="nombre"
                            name="nombre"
                            class="block mt-1 w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text"
                            value="{{ old('nombre', $disco->nombre) }}"
                            required
                            autofocus
                        />
                        @error("nombre")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Formato -->
                    <div>
                        <x-input-label for="tipo" value="Tipo de Formato" />
                        <select
                            id="tipo"
                            name="tipo"
                            class="block mt-1 w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required
                        >
                            <option value="Single" {{ old('tipo', $disco->tipo) == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="EP" {{ old('tipo', $disco->tipo) == 'EP' ? 'selected' : '' }}>EP</option>
                            <option value="Album" {{ old('tipo', $disco->tipo) == 'Album' ? 'selected' : '' }}>Album</option>
                        </select>
                        @error("tipo")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Año de Publicación -->
                    <div>
                        <x-input-label for="año" value="Año de Publicación" />
                        <x-text-input
                            id="año"
                            name="año"
                            class="block mt-1 w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="number"
                            value="{{ old('año', $disco->año) }}"
                            min="1950"
                            max="{{ date('Y') }}"
                            required
                            placeholder="Por ejemplo: 1980"
                        />
                        @error("año")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Artista o Grupo -->
                    <div>
                        <x-input-label for="artista" value="Artista o Grupo" />
                        <x-text-input
                            id="artista"
                            name="artista"
                            class="block mt-1 w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text"
                            value="{{ old('artista', $disco->artista) }}"
                            required
                            placeholder="Nombre del artista o grupo"
                        />
                        @error("artista")
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between items-center mt-6">
                    <button
                        class="btn btn-primary py-2 px-6 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                        type="submit"
                    >
                        Guardar Cambios
                    </button>
                    <a
                        href="{{ route('discos.index') }}"
                        class="btn btn-secondary py-2 px-6 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400"
                    >
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
