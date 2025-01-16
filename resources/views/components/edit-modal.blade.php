{{-- The edit modal --}}
<div class="fixed inset-0 z-50 flex hidden items-center justify-center bg-gray-500 bg-opacity-50" id="edit-modal">
    <div class="w-full max-w-2xl rounded-lg bg-white p-8 shadow-lg">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Edit Recipe</h2>
            <button class="closeModalButton text-2xl text-gray-600">&times;</button>
        </div>

        <div>
            <form id="edit-recipe-form" method="POST">
                @csrf
                @method('PATCH')

                <div class="flex gap-7">
                    <div class="mb-5">
                        <x-forms.input-label class="mb-5">Recipe Name</x-forms.input-label>
                        <x-forms.text-input id='name' name='name' required />
                    </div>
                    <div class="mb-5">
                        <x-forms.input-label class="mb-5">Category</x-forms.input-label>
                        <x-forms.text-input id='category' name='category' required />
                    </div>
                </div>
                <div class="mb-5">
                    <textarea class="min-h-2xl h-full w-full max-w-2xl" id="steps" name="steps" rows="15"></textarea>
                </div>
                <div class="mb-5">
                    <input id="image" name="image" type="file">
                </div>
                <x-forms.input-error :messages="$errors->get('message')" />
                <div>
                    <x-buttons.primary-button type="submit">{{ __('Submit') }}</x-buttons.primary-button>
                    <x-buttons.primary-button class="delete-recipe hover:bg-red-400" type="button">
                        Delete
                    </x-buttons.primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
