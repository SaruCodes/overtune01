<x-layouts.layout titulo="Overtune - Home">
    @guest
        <div
            class="hero min-h-full"
            style="background-image: url('{{ asset('images/fondo_home.jpg') }}');">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Overtune</h1>
                    <p class="mb-5 white">
                        Identificate para acceder a toda la web ¿Aun no eres miembro? Unete ahora!
                    </p>
                    <a class="btn btn-primary" href="{{route("login")}}">Login</a>
                    <a class="btn btn-primary" href="{{route("register")}}">Registro</a>
                </div>
            </div>
        </div
    @endguest
    @auth
        <div class=" p-4 card bg-base-100 image-full w-96 shadow-xl">
            <figure>
                <img
                    src="{{asset("/images/alumnos.jpeg")}}"
                    alt="Alumnos" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">¡Artistas!</h2>
                <p>Gestionamos altas, bajas, actualizaciones y borrado de una tabla de albumes musicales
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{route("alumnos.index")}}">Ver alumnos</a>
                </div>
            </div>
        </div>
    @endauth
</x-layouts.layout>
