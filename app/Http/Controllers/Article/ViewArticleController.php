<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ViewArticleController extends Controller
{
    // Show articles u can add to the wishlist
    public function showArticleForm(Request $request) {
        $wishlistId = $request->id;
        if ($request->search) {
            $filter = $request->search;
            $articles = Article::where('title','LIKE','%' . $filter . '%')->paginate(25);
        } else {

            $articles = Article::paginate(25);
        }

        return view('pages.client.create.createArticle', [
             'articles'=> $articles,
             'wishlistId' => $wishlistId
        ]);
    }

    // Show all articles (Admin section)
    public function allArticles() {
        $articles = Article::paginate(25);
        return view('pages.admin.articlesoverview', [
             'articles'=> $articles,
        ]);
    }
}
