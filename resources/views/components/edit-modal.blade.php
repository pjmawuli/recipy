<div class="{{ $errors->any() ? 'errors' : 'hidden ' }} fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50"
     id="edit-modal">
    <div class="w-full max-w-2xl rounded-lg bg-white p-8 shadow-lg">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Edit Recipe</h2>
            <button class="closeModalButton text-2xl text-gray-600">&times;</button>
        </div>

        <div>
            <form id="edit-recipe-form" method="POST" enctype="multipart/form-data"
                  action="{{ session('editing_recipe_id') ? '/recipes/' . session('editing_recipe_id') : '' }}">
                @csrf
                @method('PATCH')

                {{-- Add a hidden input to store the form id --}}
                <input id="recipeId" type="hidden" value="{{ old('Id') }}">

                <div class="flex gap-7">
                    <div class="mb-5">
                        <x-forms.input-label class="mb-5">Recipe Name</x-forms.input-label>
                        <x-forms.text-input
                                            class="{{ $errors->has('name') ? 'border-red-500' : '' }}" id='recipeName'
                                            name='name' :value="old('name')" required />
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-forms.input-label class="mb-5">Category</x-forms.input-label>
                        <x-forms.text-input
                                            class="{{ $errors->has('category') ? 'border-red-500' : '' }}"
                                            id='recipeCategory' name='category' :value="old('category')" required />
                        @error('category')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <textarea
                              class="min-h-2xl {{ $errors->has('steps') ? 'border-red-500' : '' }} h-full w-full max-w-2xl" id="recipeSteps"
                              name="steps" rows="15">{{ old('steps') }}</textarea>
                    @error('steps')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input id="image" name="image" type="file">
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-buttons.primary-button
                                              class="hover:bg-green-400" type="submit">
                        Update
                    </x-buttons.primary-button>
                    <x-buttons.primary-button
                                              class="delete-recipe hover:bg-red-400" type="button">
                        Delete
                    </x-buttons.primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
