<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('recipe.store') }}">
                @csrf
                <div class="flex gap-7">
                    <div class="mb-5">
                        <x-input-label class="mb-5">Recipe Name</x-input-label>
                        <x-text-input name='name' required />
                    </div>
                    <div class="mb-5">
                        <x-input-label class="mb-5">Category</x-input-label>
                        <x-text-input name='category' required />
                    </div>
                </div>
                <div class="mb-5">

                    <textarea class="w-full max-w-2xl" name="steps" rows=12 required placeholder="Steps..."></textarea>
                </div>
                <div class="mb-5">
                    <x-input-label class="mb-5">Upload and Image of the meal you just described!</x-input-label>
                    <input name="image" type="file" />
                </div>
                <x-input-error :messages="$errors->get('message')" />
                <x-primary-button>{{ __('Submit') }} </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
