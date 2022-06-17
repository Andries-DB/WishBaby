@extends('layouts.master')

@section('content')
<body>
    @include('components.header')
    <div class="flex flex-col sm:justify-center items-center pt-6 mt-5 sm:pt-0 bg-rose-100">
        @foreach ($wishlist as $wishlist )
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
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

                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-5"for="code">Code</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text" name="code" value= {{ $wishlist->code}} disabled>
                </div>
                <form action="{{ route('deleteList' , $wishlist->id) }}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" class="mt-3 bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1">Delete</button>
                </form>
            </div>
            <div class="w-full sm:max-w-md px-6 py-4 mt-5 bg-white shadow-md sm:rounded-lg">
                <div class="flex items-center justify-center mt-4">
                    <h2 class="font-bold text-4xl uppercase">Artikels</h2>
                </div>
                <div class="mt-4 flex justify-end">
                    <a href=" {{ route('newArticle' , $wishlist->id)}}" class="bg-yellow-100 text-black hover:bg-yellow-300 px-4 rounded-md drop-shadow-md py-1 "> + Voeg een nieuw artikel toe</a>
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
                        <form action="{{ route('deleteArticle' ,[$wishlist->id , $article->article->id]) }}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="text-l text-gray-700 dark:text-gray-500 hover:underline pt-3">Delete</button>
                        </form>

                    </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>


</body>
</html>
@endsection
