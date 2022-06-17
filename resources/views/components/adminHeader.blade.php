<div class="bg-rose-300 top-0 left-0 right-0 px-6 py-7 sm:block">
    @if (Route::has('login'))
        @auth
        <div class="flex justify-between">
            <div class="">
                @foreach(['dashboard', 'scraper' , 'articles'] as $route)
                <a href="{{ route($route) }}" class="text-l text-gray-700 dark:text-gray-500 hover:underline mr-5">{{$route}}</a>
                @endforeach
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1" type="submit">Logout</button>
            </form>
        </div>
        @endauth
    @endif
</div>
