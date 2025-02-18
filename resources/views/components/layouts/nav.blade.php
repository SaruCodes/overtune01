<nav class ="md:h-10v bg-nav
flex flex-col md:flex-row space-x-2 px-3 justify-start" >
    <a class="btn btn-sm btn-primary" href="">Inicio</a>
    <a class="btn btn-sm btn-primary" href="">Novedades</a>
    <a class="btn btn-sm btn-primary" href="">Mejor Puntuados</a>
    <a class="btn btn-sm btn-primary" href="">Iniciar Sesion</a>
    <div class="hidden md:flex flex-row space-x-3">
        @auth
            <span class="text-white">{{ auth()->user()->name }}</span>

            <form action="{{route("logout")}}" method="POST">
                @csrf
                <input class="btn  btn-glass" type="submit" value="Logout">
            </form>
            Logout

        @endauth
        @guest
            <a class="btn  btn-glass" href="{{route("login")}}">Login</a>
            <a class="btn  btn-glass" href="{{route("register")}}">Register</a>
        @endguest

    </div>
</nav>
