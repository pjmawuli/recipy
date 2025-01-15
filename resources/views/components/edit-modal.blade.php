@props(['recipe'])

<!-- The beginning of the Modal -->
<div class="fixed inset-0 z-50 flex hidden items-center justify-center bg-gray-500 bg-opacity-50"
     id="modal-{{ $recipe->id }}">

    <div class="w-full max-w-2xl rounded-lg bg-white p-8 shadow-lg">

        {{-- Recipe title --}}
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Edit Recipe</h2>
            <button class="closeModalButton text-2xl text-gray-600"
                    id="closeModalButton-{{ $recipe->id }}">&times;</button>
        </div>

        {{-- Content --}}
        <div>
            <div class="">

                {{-- Update --}}
                <form method="POST" action="{{ route('recipe.update', ['recipe' => $recipe]) }}">
                    @csrf
                    @method('PATCH')

                    {{-- The Delete form --}}
                    <form id="delete-form" action="{{ route('recipe.delete', $recipe) }}" method="POST" hidden>
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="flex gap-7">

                        <div class="mb-5">
                            <x-forms.input-label class="mb-5">Recipe Name</x-forms.input-label>
                            <x-forms.text-input id='name' name='name' value="{{ $recipe->name }}" required />
                        </div>
                        <div class="mb-5">
                            <x-forms.input-label class="mb-5">Category</x-forms.input-label>
                            <x-forms.text-input id='category' name='category' value="{{ $recipe->category }}"
                                                required />
                        </div>
                    </div>
                    <div class="mb-5">
                        <textarea class="min-h-2xl h-full w-full max-w-2xl" id="steps" name="steps" rows="15"> {{ $recipe->steps }} </textarea>
                    </div>
                    <div class="mb-5">
                        <forms.input id="image" name="image" type="file">
                    </div>
                    <x-forms.input-error :messages="$errors->get('message')" />
                    <div>

                        <x-buttons.primary-button>{{ __('Submit') }} </x-buttons.primary-button>
                        <x-buttons.primary-button class="hover:bg-red-400"
                                                  onclick="document.getElementById('delete-form').submit()">Delete</x-buttons.primary-button>
                    </div>

                </form>
            </div>
        </div>

        <div class="mt-4 flex justify-end">
        </div>
    </div>
</div>
