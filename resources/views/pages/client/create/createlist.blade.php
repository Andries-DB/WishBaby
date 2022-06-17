@extends('layouts.master')

@section('content')
<body>
    @include('components.header')


    <div class="flex flex-col sm:justify-center items-center pt-6 mt-5 sm:pt-0 bg-rose-100">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <div class="flex items-center justify-center mt-4">
                <h2 class="font-bold text-4xl uppercase">Nieuwe wenslijst</h2>
            </div>
            <form method="POST" action="{{ route('newListPOST') }}" class="py-10">
                @csrf
                <!-- Name wishlist -->
                <div>
                    <label for="name" class="text-black">Name wishlist</label>

                    <x-input id="name" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"  type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Baby name -->
                <div class="mt-4">
                    <label for="babyname" class="text-black">Name Baby</label>

                    <x-input id="babyname" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"  type="text" name="babyname" :value="old('babyname')" required autofocus />
                </div>

                <div class="mt-4">
                    <label for="code" class="text-black">Secret code</label>

                    <x-input id="code" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"  type="password" name="code" :value="old('code')" required autofocus />
                </div>

                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 ">
                        {{ __('Make new Wishlist') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

@endsection
