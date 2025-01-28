@props(['recipe'])

<article class="flex max-w-xl flex-col items-start justify-between">
    <a href="/recipes/{{ $recipe->id }}">

        {{-- The image --}}
        <img class="mb-2 rounded-xl" src="{{ asset('storage/' . $recipe->image) }}">
        <div class="flex items-center gap-x-4 text-xs">
            <x-time :$recipe />
            <x-recipe.category-tag :$recipe />
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                <a href="/recipes/{{ $recipe->id }}">
                    <span class="absolute inset-0"></span>
                    {{ $recipe->name }}
                </a>
            </h3>
        </div>
    </a>
    {{-- The Creator's Details --}}

    <div class="relative mt-3 flex w-full items-center justify-between gap-x-4">
        <div class="flex items-center gap-x-4">
            <x-profile-pic :$recipe />
            <div class="text-sm/6">
                <p class="font-semibold text-gray-900">
                    {{ $recipe->user->name }}
                </p>
            </div>
        </div>
        <div>
            <button class="openModalButton" data-recipe-id="{{ $recipe->id }}" data-recipe-name="{{ $recipe->name }}"
                    data-recipe-category="{{ $recipe->category }}" data-recipe-steps="{{ $recipe->steps }}">
                <x-buttons.edit-icon />
            </button>
        </div>
    </div>
</article>
