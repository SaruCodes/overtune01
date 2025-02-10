{{--Header para desktop--}}
<header class="md:h-15v bg-header
    flex flex-col md:flex-row justify-between px-3 items-center">
    <img class="w-1/2 h-12  md:w-1/12 md:max-h-full" src="{{asset("images/logo.jpeg")}}" alt="logo">
    <h1 class = "hidden md:block text-white text-5xl" > GESTIÓN INSITITUTO</h1>
    {{--Laptop--}}
    <div class="hidden md:flex md:items-center">
        @auth
            <span class="text-white mr-4">{{ auth()->user()->name }}</span>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <input class="btn  btn-glass" type="submit" value="Logout">
            </form>

        @endauth
        @guest
            <a class="btn  btn-glass" href="{{route("login")}}">Login</a>
            <a class="btn  btn-glass" href="{{route("register")}}">Register</a>
        @endguest
    </div>
    {{--Mobile--}}
    <div class="block md:hidden">
        <input type="checkbox" name="" id="menu-toggle" class="peer hidden">
        <label class="text-2xl hover:cursor-pointer text-white" for="menu-toggle">
            &#9778
        </label>
        <div class="absolute hidden peer-checked:block bg-gray-300 p-3 rounded-xl flex-col">
            @auth
                <span class="text-white mr-4">{{ auth()->user()->name }}</span>
                <form action="{{route("logout")}}" method="POST">
                    @csrf
                    <input class="btn  btn-glass" type="submit" value="Logout">
                </form>

            @endauth
            @guest
                <a class="btn  btn-glass" href="{{route("login")}}">Login</a>
                <a class="btn  btn-glass" href="{{route("register")}}">Register</a>
            @endguest
        </div>
    </div>

</header>
{{--Header para desktop--}}

