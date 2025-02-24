{{--Header para desktop--}}
<header class="md:h-15v bg-header flex flex-col md:flex-row justify-between px-3 items-center">
    <img class="w-auto h-14 md:h-20 md:w-auto mx-auto object-contain" src="{{ asset('images/logo.png') }}" alt="logo">

    {{--Mobile--}}
    <div class="block md:hidden">
        <input type="checkbox" name="" id="menu-toggle" class=" peer hidden">
        <label  class="text-2xl hover:cursor-pointer text-white" for="menu-toggle">
            &#9778;
        </label>


        <div class="absolute hidden peer-checked:block bg-gray-300 p-3 rounded-xl flex flex-col">
            @auth
                <span class="text-white">{{ auth()->user()->name }}
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

    </div>

</header>
{{--Header para desktop--}}
