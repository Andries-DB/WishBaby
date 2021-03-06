@extends('layouts.master')

@section('content')
<body>
    @include('components.adminHeader')
    <!-- All articles overview -->
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach ( $articles as $article )
        <div class="rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{$article->src}}" alt="Mountain">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">{{$article->title}}</div>
              <details class="text-gray-700 text-base">
                  <summary>Beschrijving</summary>
                  {{$article->description}}
              </details>
            </div>
            <div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Prijs: €{{$article->price}}</span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Categorie: {{$article->category->title}}</span>

            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-14 my-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</body>
</html>

</body>
</html>
@endsection
