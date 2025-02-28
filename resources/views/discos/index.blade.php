<x-layouts.layout titulo="Overtune - Gestión">
    @if (session("mensaje"))
        <div id="message" role="alert" class="alert alert-success text-lg text-white bg-green-600 p-3 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current mr-2" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session("mensaje") }}</span>
        </div>
    @endif

    <div class="p-4 bg-gray-200 flex space-x-4">
        <a class="btn btn-primary text-lg" href="{{route("discos.create")}}">Nuevo Disco</a>
        <a class="btn btn-secondary text-lg" href="{{ route("home") }}">Volver</a>
    </div>

    <div class="max-h-full overflow-x-auto p-4 mb-20">
        <table class="table-auto w-full border-collapse border border-gray-300 text-base text-gray-800">
            <thead class="bg-indigo-400 text-xl font-bold">
            <tr>
                @foreach($campos as $campo)
                    <th class="border border-gray-400 p-2">{{$campo}}</th>
                @endforeach
                <!-- Add Edit Column Header -->
                <th class="border border-gray-400 p-2">Editar</th>
                <th class="border border-gray-400 p-2">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($filas as $fila)
                <tr class="border border-gray-300 hover:bg-gray-100">
                    @foreach($campos as $campo)
                        <td class="border border-gray-300 p-3">{{$fila->$campo}}</td>
                    @endforeach

                    <!-- Edit Button -->
                    <td class="border border-gray-300 p-3">
                        <a href="{{ route('discos.edit', $fila->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-blue-600 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>

                    <!-- Delete Button -->
                    <td class="border border-gray-300 p-3 flex space-x-2">
                        <form onsubmit="event.preventDefault()" id="formulario{{$fila->id}}" action="{{ route("discos.destroy", $fila->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button onclick="confirmDelete({{$fila->id}})" class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        {{-- Botón Ver --}}
                        <a class="text-blue-600 hover:text-blue-800" href="#">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>
