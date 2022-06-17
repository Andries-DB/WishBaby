<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Scraper</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('dashboard')}}">dashboard</a>
            <a class="nav-item nav-link active" href="{{route('scraper')}}">scraper</span></a>
            <a class="nav-item nav-link" href="{{route('articles')}}">articles</a>
          </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-warning" type="submit">Logout</button>
        </form>
      </nav>

    <div class="container">
        <div class="row py-5">
            <div class="col-sm-8 offset-sm-2">
                <h1>Let's scrape some data</h1>
                <form action="{{ route('scrape.categories') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="">
                            <label for="shop">Webshop</label>
                        </div>
                        <select name="shop" id="shop" class="form-control">
                            @foreach ($shops as $key => $shop)
                                <option value="{{ $key }}">
                                    {{ $shop }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group py-3">
                        <div class="">
                            <label for="url">
                                Collection URL
                            </label>
                            <input required class="form-control" type="url" name="url" id="url" placeholder="e.g. http://bol.com/speelgoed">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Scrape categories!
                        </button>
                    </div>
                </form>
                <br>
                <h2>{{$shops['MamaLoes'] }}</h2>
                <table class="table table-striped">
                    @foreach ( $mamaloesCategories as $category )
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <form action="{{ route('scrape.articles') }}" method="POST">
                                @csrf
                                <input type="hidden" name="url" value="{{ $category->url }}">
                                <input type="hidden" name="shop" value="Mama Loes">
                                <button type="submit" class="btn btn-warning">Scrape all articles</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <h2>{{$shops['Hema']}}</h2>
                <table class="table table-striped">
                    @foreach ( $hemaCategories as $category )
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <form action="{{ route('scrape.articles') }}" method="POST">
                                @csrf
                                <input type="hidden" name="url" value="{{ $category->url }}">
                                <input type="hidden" name="shop" value="Hema">
                                <button type="submit" class="btn btn-warning">Scrape all articles</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <h2>{{$shops['dreamBaby'] }}</h2>
                <table class="table table-striped">
                    @foreach ( $dreamBabyCategories as $category )
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <form action="{{ route('scrape.articles') }}" method="POST">
                                @csrf
                                <input type="hidden" name="url" value="{{ $category->url }}">
                                <input type="hidden" name="shop" value="dreamBaby">
                                <button type="submit" class="btn btn-warning">Scrape all articles</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
