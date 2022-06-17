@extends('layouts.master')

@section('content')
<body>
    @include('components.header')

    <div class="flex flex-col sm:justify-center items-center pt-6 mt-5 sm:pt-0 bg-rose-100">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <div class="flex items-center justify-center mt-4">
                <h2 class="font-bold text-4xl uppercase">Geef je code in</h2>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('loginwcode')}}" class="py-10">
                @csrf
                <!-- Code Wishlist -->
                <div>
                    <label for="code" class="text-black">Code</label>
                    <x-input id="code" class="block mt-1 w-full bg-rose-100 rounded-md drop-shadow-md"  type="text" name="code" required autofocus />
                </div>
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="mt-3 bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

@endsection
