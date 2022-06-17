@extends('layouts.master')

@section('content')
<body>
    <x-guest-layout>
        <x-auth-card>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="flex items-center justify-center mt-4">
                <h2 class="font-bold text-4xl uppercase">Registreren</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Naam')" />

                    <x-input id="name" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Gebruikersnaam -->
                <div class="mt-4">
                    <x-label for="username" :value="__('Gebruikersnaam')" />

                    <x-input id="username" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md" type="text" name="username" :value="old('username')" required autofocus />
                </div>


                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Passwoord')" />

                    <x-input id="password" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Herhaal passwoord')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <!-- Register Button -->
                <div class="mt-4 flex justify-center">
                    <button class="bg-yellow-300 text-black hover:bg-yellow-200 px-4 rounded-md drop-shadow-md py-1">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Login Button -->
                <div class="flex items-center justify-center mt-4">
                    <p> -- Heb je al een account? --</p>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <a class="bg-yellow-300 text-black hover:bg-yellow-200 px-4 rounded-md drop-shadow-md py-1 " href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</body>
</html>

@endsection
