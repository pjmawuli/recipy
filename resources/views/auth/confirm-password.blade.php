<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.text-input class="mt-1 block w-full" id="password" name="password" type="password" required
                                autocomplete="current-password" />

            <x-forms.input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div class="mt-4 flex justify-end">
            <x-buttons.primary-button>
                {{ __('Confirm') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
