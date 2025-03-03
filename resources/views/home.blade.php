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
        </div>
        <section class="p-8 bg-gray-100">
            <h2 class="text-3xl font-semibold text-center mb-8">Los 3 Mejores Álbumes</h2>
            <div class="flex justify-center gap-6">
                <!-- Álbum 1 -->
                <div class="card w-60 shadow-xl">
                    <figure>
                        <img class="w-full h-40 object-cover" src="https://via.placeholder.com/200" alt="Álbum 1" />
                    </figure>
                    <div class="card-body">
                        <h3 class="card-title">Álbum 1</h3>
                        <p>Calificación: 4.8/5</p>
                    </div>
                </div>
                <!-- Álbum 2 -->
                <div class="card w-60 shadow-xl">
                    <figure>
                        <img class="w-full h-40 object-cover" src="https://via.placeholder.com/200" alt="Álbum 2" />
                    </figure>
                    <div class="card-body">
                        <h3 class="card-title">Álbum 2</h3>
                        <p>Calificación: 4.7/5</p>
                    </div>
                </div>
                <!-- Álbum 3 -->
                <div class="card w-60 shadow-xl">
                    <figure>
                        <img class="w-full h-40 object-cover" src="https://via.placeholder.com/200" alt="Álbum 3" />
                    </figure>
                    <div class="card-body">
                        <h3 class="card-title">Álbum 3</h3>
                        <p>Calificación: 4.6/5</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Adicional de Presentación -->
        <section class="p-8 bg-blue-50">
            <h2 class="text-3xl font-semibold text-center mb-8">Bienvenido a la Plataforma</h2>
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg mb-4">
                    Explora nuestras funcionalidades para gestionar discos, álbumes y artistas.
                    Conoce la mejor forma de interactuar con la plataforma.
                </p>
                <a class="btn btn-secondary" href="{{ route('register') }}">Registrarse Ahora</a>
            </div>
        </section>
    @endguest
        @auth
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="{{asset('/images/cd.jpg')}}"
                        alt="Album"
                        class="w-60 h-60 object-cover"/>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New album is released!</h2>
                    <p>Gestionamos altas, bajas, actualizaciones y borrado de una tabla de albumes musicales</p>
                    <div class="card-actions justify-end">
                        <a class="btn btn-outline btn-primary" href="{{route("discos.index")}}">Acceso a gestión</a>
                    </div>
                </div>
            </div>
        @endauth

</x-layouts.layout>
