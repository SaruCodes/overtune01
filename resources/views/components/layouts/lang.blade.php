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
        @foreach(config('languages') as $locale => $language)
            <x-dropdown-link :href="route('language', $locale)">
                {{ $language['name'] }} {!! $language['flag'] !!}
            </x-dropdown-link>
        @endforeach
    </x-slot>
</x-dropdown>

