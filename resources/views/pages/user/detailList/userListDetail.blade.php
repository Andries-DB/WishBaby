@extends('layouts.master')

@section('content')
<body>
    @include('components.header')
    @foreach ($wishlist as $wishlist )
    <div class="flex flex-col sm:justify-center items-center pt-6 mt-5 sm:pt-0 bg-rose-100">
                    <div class="mt-4 w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
                <div class="flex items-center justify-center mt-4">
                    <h2 class="font-bold text-4xl uppercase">Details {{ $wishlist->name }} </h2>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-5"for="name">Naam Babylist</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text" name="name" value={{ $wishlist->name}} disabled>

                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-5"for="babyName">Naam Baby</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text" name="babyName" value="Voor {{ $wishlist->babyName}}" disabled>

                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-5"for="babyName">Gemaakt door</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text" name="babyName" value= {{ $wishlist->user->name}} disabled>

                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-5"for="babyName">Gemaakt op</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text" name="babyName" value= {{ $wishlist->created_at}} disabled>

                </div>
            </div>
            <div class="w-full sm:max-w-md px-6 py-4 mt-5 bg-white shadow-md sm:rounded-lg">
                <div class="flex items-center justify-center mt-4">
                    <h2 class="font-bold text-4xl uppercase">Artikels</h2>
                </div>
                <div>
                    @foreach ($WishlistArticles as $article )
                    <div class="w-full sm:max-w-md px-6 py-4 mt-6 bg-gray-200 shadow-md sm:rounded-lg">
                        <!-- Titel Article -->
                        <div class="flex items-center justify-start mt-2">
                            <h4 class="font-bold text-xl uppercase">{{$article->article->title}}</h4>
                        </div>
                        <div class="flex justify-between mt-2">
                            <!-- Info wenslijst-->
                            <div class="justify-start">
                                <p>Prijs: €{{$article->article->price}} </p>
                                <details>
                                    <summary>Beschrijving</summary>
                                    {{$article->article->description}}
                                </details>

                            </div>
                            <!-- Image wenslijst-->
                            <div class="mr-5 w-20 h-15">
                                <img src={{$article->article->src}} alt="IMG">
                            </div>
                        </div>
                        <form method="POST">
                            @csrf
                            <input type="hidden" name="article" value="{{$article->article->id}}">
                            <input type="hidden" name="wishlist" value="{{$wishlist->id}}">
                            <button type="submit" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1">Koop artikel</button>
                        </form>

                    </div>
                    @endforeach
                </div>

            </div>
        @endforeach
        <div class="w-full sm:max-w-md px-6 my-4 py-4 bg-white shadow-md sm:rounded-lg">
            <div class="flex items-center  mt-4">
                <h2 class="font-bold text-4xl uppercase">Jouw winkelmandje</h2>
            </div>
            <div class="w-full bg-white rounded-lg mt-3">
                <ul class="divide-y-2 divide-gray-400">
                    @foreach ($cartItems->getContent() as $item )
                        <li class="flex justify-around  hover:bg-blue-600 hover:text-blue-200">
                            <p>{{$item->name}}</p>
                            <p><b>€{{$item->price}}</b></p>
                        </li>
                    @endforeach
                </ul>
                <h3><b>Totaal:</b> {{ $cartItems->getTotal() }}</h3>
                <form action="{{ route('checkout') }}" method="get" class="bg-white px-8 pt-6 pb-8 mb-4">
                    <input type="hidden" name="wishlist" value={{$wishlist->id}}>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Naam
                        </label>
                        <input required type="text" placeholder="Naam" name="name">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="remarks">
                            Remarks
                        </label>
                        <input type="text" placeholder="Extra woordje" name="remarks"><br>
                    </div>
                    <button class="mt-5 bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1" type="submit">Betaal!</button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
@endsection
