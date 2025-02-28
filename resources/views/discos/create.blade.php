<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->



        <form action="{{route("alumnos.store")}}" method="POST">
            @csrf
            <div class="bg-white grid grid-cols-2 gap-4 divide-x-8">
                {{--                datos--}}
                <div class="bg-white rounded-2xl p-5 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="name" value="Nombre"/>
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                      value="{{old('nombre')}}"/>
                        @error("nombre")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror


                    </div>
                    <div>
                        <x-input-label for="email" value="Email"/>
                        <x-text-input id="email" class="block mt-1 w-full"
                                      type="email" name="email"
                                      value="{{old('email')}}"
                                      required autofocus autocomplete="email" />
                        @error("email")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                    <div>
                        <x-input-label for="f_nac" value="Fecha de Nacimiento" />

                        <x-text-input id="f_nac" class="block mt-1 w-full"
                                      type="date" name="f_nac"
                                      value="{{old('f_nac')}}"
                                      required autofocus autocomplete="Fecha de nacimiento" />
                        @error("f_nac")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                    <div>
                        <x-input-label for="dni" value="DNI" />
                        <x-text-input id="dni" class="block mt-1 w-full"
                                      type="text" name="dni"
                                      value="{{old('dni')}}"
                                      required autofocus autocomplete="Dni"/>
                        @error("dni")
                        <div class="text-sm text-red-600">
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="max-h-96 overflow-y-auto px-4 text-sm">
                    <h2 class="font-semibold text-lg mb-2">Listado de idiomas</h2>
                </div>
                <div class="p-2">
                    <button class= "btn btn-sm btn-success"  type="submit">Guardar </button>
                    <a class= "btn btn-sm btn-success" href="{{route("alumnos.index")}}">Cancelar</a>
                </div>
            </div>
        </form>
        {{--                idiomas--}}


    </div>

    </div>

</x-layouts.layout>
