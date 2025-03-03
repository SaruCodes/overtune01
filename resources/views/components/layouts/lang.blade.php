<x-dropdown>
    <x-slot name="trigger">
        <div class=" text-white text-2xl bg-gray-900 p-4">
            <span class="flex flex-row space-x-2">
                {{config("languages")[App::getLocale()]['name']}}
                {{config("languages")[App::getLocale()]['flag']}}
            </span>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach(config("languages") as $code =>$lang)
            <span class="flex flex-row space-x-2 hover:cursor-pointer ">
              <a href="{{route('language',$code)}}" class ="hover:bg-gray-300 ">
                  {{$lang['name']}}
                  {{$lang['flag']}}
                </a>
            </span>

        @endforeach

    </x-slot>


</x-dropdown>
