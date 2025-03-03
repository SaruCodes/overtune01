<div class="navbar bg-base-100 md:h-10v bg-nav flex flex-col md:flex-row space-x-2 px-3 justify-start items-center">
    <!-- Logo (Oculto en móvil) -->
    <div class="flex-1">
        <a href="{{ route('home') }}">
            <img class="w-auto h-auto max-h-14 md:max-h-20 max-w-full mx-auto object-contain hidden md:block"
                 src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>

    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a class="btn btn-outline btn-secondary" href="{{ route('home') }}">Inicio</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Novedades</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Mejor puntuados</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Artistas</a></li>
            <li>
            <x-layouts.lang />
                @guest
                    <!-- Botón de acceso oculto en móvil -->
                    <details class="hidden md:inline-block">
                        <summary><a class="btn btn-outline btn-primary">Acceso</a></summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a class="btn btn-outline btn-primary" href="{{ route('login') }}">Login</a></li>
                            <li><a class="btn btn-outline btn-primary" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </details>
                @endguest
                @auth
                    <span class="text-white">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Logout">
                    </form>
                @endauth
            </li>
        </ul>
    </div>
</div>
