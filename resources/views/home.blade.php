<x-layouts.layout titulo="Overtune - Home">
    <div
        class="hero min-h-[80vh]"
        style="background-image: url('{{ asset('images/fondo_home.jpg') }}');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Overtune</h1>
                <p class="mb-5 white">
                    {{ __('La web para fanáticos de la música. Puntúa, reseña y guarda tus lanzamientos musicales favoritos')}}
                </p>
            </div>
        </div>
    </div>
    <section class="p-8 bg-gray-100">
        <h2 class="text-3xl font-semibold text-center mb-8">{{ __('Los 3 Mejores Álbumes') }}</h2>
        <div class="flex justify-center gap-6">
            <!-- Aquí mostramos los discos -->
            @foreach ($discos as $disco) <!-- Usamos $discos, que es lo que pasamos desde el controlador -->
            <div class="card w-60 shadow-xl">
                <figure>
                    <!-- Verifica si tiene imagen o usa la imagen predeterminada -->
                    <img class="w-full h-40 object-cover" src="{{ $disco->cover_image ? asset('storage/' . $disco->cover_image) : 'https://via.placeholder.com/200' }}" alt="{{ $disco->titulo }}" />
                </figure>
                <div class="card-body">
                    <h3 class="card-title">{{ $disco->titulo }}</h3>
                    <p>{{ __('Artista: ') }}{{ $disco->artista }}</p>
                    <p>Calificación: 4.8/5</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    @guest
        <!-- Sección Adicional de Presentación -->
        <section class="p-8 bg-blue-50">
            <h2 class="text-3xl font-semibold text-center mb-8">{{__ ('Bienvenido a Overtune')}}</h2>
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg mb-4">
                    {{ __('Explora nuestras funcionalidades para gestionar discos, álbumes y artistas.
                    Conoce la mejor forma de interactuar con la plataforma.')}}
                </p>
                <a class="btn btn-secondary" href="{{ route('register') }}">{{__ ('Registrarse Ahora')}}</a>
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
                    <h2 class="card-title">{{__ ('Gestion de biblioteca de Música')}}</h2>
                    <p>{{__ ('Gestionamos altas, bajas, actualizaciones y borrado de una tabla de albumes musicales')}}</p>
                    <div class="card-actions justify-end">
                        <a class="btn btn-outline btn-primary" href="{{route("discos.index")}}">{{__ ('Acceso a gestión')}}</a>
                    </div>
                </div>
            </div>
        @endauth

</x-layouts.layout>
