<nav class="md:h-10v bg-nav flex flex-col md:flex-row space-x-2 px-3 justify-start items-center">
    <!-- Elementos de la izquierda -->
    <a class="btn btn-outline btn-secondary" href="">Inicio</a>
    <a class="btn btn-outline btn-secondary" href="">Novedades</a>
    <a class="btn btn-outline btn-secondary" href="">Mejor Puntuados</a>
    <a class="btn btn-outline btn-secondary" href="">Top Artistas</a>

    <!-- Contenedor para login y registro a la derecha -->
    <div class="ml-auto hidden md:flex flex-col space-y-2">
        @auth
            <span class="text-white">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input class="btn btn-glass" type="submit" value="Logout">
            </form>
        @endauth
        @guest
            <a class="btn btn-outline btn-primary" href="{{ route('login') }}">Login</a>
            <a class="btn btn-outline btn-primary" href="{{ route('register') }}">Register</a>
        @endguest
    </div>
</nav>
