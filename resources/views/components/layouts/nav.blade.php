<div class="navbar bg-base-100 bg-nav h-18 md:h-21 flex flex-row px-4 justify-between items-center z-50 overflow-visible">
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
            <li><a class="btn btn-outline btn-secondary" href="{{ route('home') }}">{{ __('Inicio') }}</a></li>
            <li><a class="btn btn-outline btn-secondary" href="{{ route('novedades') }}">{{ __('Novedades') }}</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">{{ __('Mejor puntuados') }}</a></li>
            <li><a class="btn btn-outline btn-secondary" href="">{{ __('Artistas') }}</a></li>
            <li class="flex items-center">
                <x-layouts.lang />
            </li>
            <li class="flex items-center relative z-50">
                @guest
                    <details class="relative flex items-center z-50">
                        <summary class="btn btn-outline btn-primary">{{ __('Acceso') }}</summary>
                        <ul class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 max-w-[80vw] w-auto bg-violet-900 text-white rounded-md shadow-lg p-2 z-50">
                            <li><a class="block px-4 py-2 hover:bg-violet-800 rounded-md" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="block px-4 py-2 hover:bg-violet-800 rounded-md" href="{{ route('register') }}">{{ __('Registro') }}</a></li>
                        </ul>
                    </details>
                @endguest
                @auth
                    <span class="text-white mx-2">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="{{ __('Cerrar sesión') }}">
                    </form>
                @endauth
            </li>
        </ul>
    </div>
</div>
