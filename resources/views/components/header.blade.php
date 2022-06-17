<div class="bg-rose-300 top-0 left-0 right-0 px-6 py-7 sm:block">
    @if (Route::has('login'))
        @auth
        <div class="flex justify-between">
            @foreach(['dashboard'] as $route)
            <a href="{{ route($route) }}" class="text-l text-gray-700 dark:text-gray-500 hover:underline">{{$route}}</a>
            @endforeach
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1" type="submit">Logout</button>
            </form>
        </div>

        @else
            <a href="{{ route('login') }}" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 mr-3">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 ">Register</a>
            @endif
        @endauth
    @endif
</div>
