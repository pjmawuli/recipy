<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-12">

        <h2 class="mb-8 text-xl">{{ $recipe['name'] }}</h2>
        <div class="mb-8 space-y-3">
            <h2>The steps</h2>
            <div>
                {{ $recipe['steps'] }}
            </div>
        </div>
        @if ($recipe->user->is(Auth::user()))
            <div>
                <button class="rounded bg-blue-400 p-2">
                    <a href="/recipes/{{ $recipe->id }}/edit"> Edit
                    </a>
                </button>
            </div>
        @endif
    </div>

    </div>
</x-app-layout>
