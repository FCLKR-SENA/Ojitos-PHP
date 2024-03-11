<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-3">
            <x-input-label for="name" :value="__('Nombres')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para los nombres"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Lastname-->
        <div class="mt-3">
        <x-input-label for="lastname" :value="__('Apellidos')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para los apellidos"/>
            <x-input-error :messages="$errors->get('lastname')" class="mt-3" />
        </div>

        <!-- Document -->
        <div class="mt-3">
            <x-input-label for="document" :value="__('Numero de documento')" />
            <x-text-input id="document" class="block mt-1 w-full" type="text" name="document" :value="old('document')" required autofocus autocomplete="document" minlength="7" maxlength="12" pattern="\d{7,12}" title="Por favor, ingrese entre 7 y 12 dígitos para el número de documento"/>
            <x-input-error :messages="$errors->get('document')" class="mt-2" />
        </div>

        <!-- Edad -->
        <div class="mt-3">
            <x-input-label for="age" :value="__('edad')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" min="0" max="120" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}"
                            title="La contraseña debe tener al menos 8 caracteres, 1 mayúscula, 1 minúscula y al menos un carácter especial" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
