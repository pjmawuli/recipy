<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.input-label for="name" :value="__('Name')" />
            <x-forms.text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')"
                                required autofocus autocomplete="name" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')"
                                required autocomplete="username" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.text-input class="mt-1 block w-full" id="password" name="password" type="password" required
                                autocomplete="new-password" />

            <x-forms.input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.text-input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation"
                                type="password" required autocomplete="new-password" />

            <x-forms.input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-buttons.primary-button class="ms-4">
                {{ __('Register') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
