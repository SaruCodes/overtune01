<x-dropdown>
    <x-slot name="trigger">
        <div class="btn btn-outline btn-secondary">
            <span class="flex flex-row space-x-2">
                {{ config("languages")[App::getLocale()]['name'] }}
                {{ config("languages")[App::getLocale()]['flag'] }}
            </span>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach(config("languages") as $code => $lang)
            <span class="">
                <a href="{{ route('language', $code) }}" class="px-2 py-1">
                    {{ $lang['name'] }}
                    {{ $lang['flag'] }}
                </a>
            </span>
        @endforeach
    </x-slot>
</x-dropdown>
