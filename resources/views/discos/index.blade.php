<x-layouts.layout>
    @if (session("mensaje"))
        <div id="message" role="alert" class="alert alert-success">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{session("mensaje")}}</span>
        </div>
    @endif

    <div class="p-2 bg-gray-200">
        {{--Crear nuevo CD en la BBDD--}}
        <a class="btn btn-sm btn-secondary">Nuevo Disco</a>
        <a class="btn btn-sm btn-secondary" href="{{route("home")}}">Volver</a>
    </div>
    <div class="max-h-full overflow-x-auto">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr>
                @foreach($campos as $campo)
                    <th>{{$campo}}</th>
                @endforeach
                <th></th><th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr>
                    @foreach($campos as $campo)
                        <td>{{$fila->$campo}}</td>
                    @endforeach
                    {{--El edit--}}

                    {{-- Delete --}}
                    <td>
                        <form onsubmit=event.preventDefault() id="formulario{{$fila->id}}" action="{{route("alumnos.destroy",$fila->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button onclick="confirmDelete({{$fila->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" hover:text-red-800 size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td><a>Ver</a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>
