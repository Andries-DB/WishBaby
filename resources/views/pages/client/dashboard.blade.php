@extends('layouts.master')

@section('content')
<body>
    @include('components.header')

    <div class="flex flex-col sm:justify-center items-center pt-6 mt-5 sm:pt-0 bg-rose-100">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <div class="flex items-center justify-center mt-4">
                <h2 class="font-bold text-4xl uppercase">Jouw Wenslijsten</h2>
            </div>

            <div class="mt-4 flex justify-end">
                <a href=" {{ route('newList')}}" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 "> + Maak een nieuwe wenslijst</a>
            </div>
            @foreach ($wishlists as $wishlist )
            <div class="flex flex-col sm:justify-center items-center pt-6 rounded-md mt-5 sm:pt-0 bg-rose-100">
                <div class="w-full sm:max-w-md px-6 py-4 bg-gray-200 shadow-md sm:rounded-lg">
                    <!-- Titel wenslijst -->
                    <div class="flex items-center justify-start mt-2">
                        <h4 class="font-bold text-xl uppercase">{{ $wishlist->name }}</h4>
                    </div>
                    <div class="flex justify-between mt-2">
                        <!-- Info wenslijst-->
                        <div class="justify-start">
                            <p>Voor {{ $wishlist->babyName }}</p>
                            <p>Toegevoegd door {{ $wishlist->user->name }}</p>
                        </div>
                        <!-- Image wenslijst-->
                        <div class="mr-5 w-20 h-15">
                            <img src="https://images.unsplash.com/photo-1651760548421-f9c28517a955?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="IMG">
                        </div>
                    </div>
                    <a href="{{ route('listdetail' ,$wishlist->id)}}" class="text-l text-gray-700 dark:text-gray-500 hover:underline">Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>

@endsection
