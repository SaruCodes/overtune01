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
        <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-40 bg-violet-900 text-white rounded-md shadow-lg p-2 z-50">
            @foreach(config('languages') as $locale => $language)
                <x-dropdown-link :href="route('language', $locale)" class="block px-4 py-2 hover:bg-violet-800 rounded-md">
                    {{ $language['name'] }} {!! $language['flag'] !!}
                </x-dropdown-link>
            @endforeach
        </div>
    </x-slot>
</x-dropdown>
