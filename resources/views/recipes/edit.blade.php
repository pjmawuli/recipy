<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('recipe.update', ['recipe' => $recipe]) }}">
                @csrf
                @method('PATCH')
                <div class="flex gap-7">
                    <div class="mb-5">
                        <x-input-label class="mb-5">Recipe Name</x-input-label>
                        <x-text-input id='name' name='name' value="{{ $recipe->name }}" required />
                    </div>
                    <div class="mb-5">
                        <x-input-label class="mb-5">Category</x-input-label>
                        <x-text-input id='name' name='category' value="{{ $recipe->category }}" required />
                    </div>
                </div>
                <div class="mb-5">
                    <textarea class="min-h-2xl h-full w-full max-w-2xl" id="steps" name="steps"> {{ $recipe->steps }} </textarea>
                </div>
                <x-input-error :messages="$errors->get('message')" />
                <x-primary-button>{{ __('Submit') }} </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
