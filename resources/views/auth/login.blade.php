@extends('layouts.master')

@section('content')
<body>
    <x-guest-layout>
        <x-auth-card>
            <div class="flex items-center justify-center mt-4">
                <h2 class="font-bold text-4xl uppercase">Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="py-10">
                @csrf
                <!-- Email Address -->
                <div>
                    <label for="email" class="text-black">Email</label>

                    <x-input id="email" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"  type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="text-black">Passwoord</label>

                    <x-input id="password" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Wachtwoord vergeten?') }}
                        </a>
                    @endif

                </div>
                <div class="mt-4 flex justify-center">
                    <button class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 ">
                        {{ __('Log in') }}
                    </button>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <p> -- Heb je nog geen account? --</p>
                </div>

                <div class="mt-4 flex justify-center">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 ">Register</a>
                    @endif
                </div>
            </form>
        </x-auth-card>

    </x-guest-layout>

</body>
</html>

@endsection
