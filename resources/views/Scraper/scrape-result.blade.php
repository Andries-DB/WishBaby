<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Scraper Results</title>
</head>
<body>


    <div class="container">
        <div class="row py-5">
            @foreach ( $articles as $article )
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <article>
                        <h5>{{ $article->title }}</h5>
                        <img src="{{ $article->image }}" alt="No image found for {{ $article->title }}" class="img-fluid">
                        <h5>€ {{ $article->price }}</h5>
                    </article>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
