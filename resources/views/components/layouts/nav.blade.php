<div class="navbar bg-base-100 bg-nav h-18 md:h-23 flex flex-row px-4 justify-between items-center">
    <!-- Logo (Oculto en móvil) -->
    <div class="flex-1 flex items-center">
        <a href="{{ route('home') }}">
            <img class="w-auto h-auto max-h-14 md:max-h-16 max-w-full mx-auto object-contain hidden md:block"
                 src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>

    <!-- Menú de Navegación -->
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 space-x-4 flex items-center h-full">
            <li><a class="btn btn-outline btn-secondary" href="{{ route('home') }}">Inicio</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Novedades</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Mejor puntuados</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">Artistas</a></li>
            <li class="flex items-center">
                <x-layouts.lang />
            </li>
            <li class="flex items-center">
                @guest
                    <!-- Botón de acceso con menú desplegable -->
                    <details class="relative flex items-center">
                        <summary class="btn btn-outline btn-primary">Acceso</summary>
                        <ul class="absolute left-0 mt-2 w-40 bg-base-100 rounded-md shadow-lg p-2">
                            <li><a class="btn btn-outline btn-primary w-full" href="{{ route('login') }}">Login</a></li>
                            <li><a class="btn btn-outline btn-primary w-full" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </details>
                @endguest
                @auth
                    <span class="text-white mx-2">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Logout">
                    </form>
                @endauth
            </li>
        </ul>
    </div>
</div>
