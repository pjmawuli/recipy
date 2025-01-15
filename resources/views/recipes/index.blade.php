@props(['recipes'])

<x-app-layout>
    <div class="py-5">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white py-5 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            Recipes
                        </h2>
                        <p class="mt-2 text-lg/8 text-gray-600">
                            Awesome recipes for everyone
                        </p>
                    </div>
                    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                         id='recipes-container'>

                        @foreach ($recipes as $recipe)
                            <x-recipe.recipe-card :recipe="$recipe" />
                        @endforeach
                        @vite('resources/js/modal-behaviour.js')
                        <!-- More posts... -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
