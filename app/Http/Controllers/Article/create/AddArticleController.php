<?php

namespace App\Http\Controllers\Article\create;

use App\Http\Controllers\Controller;
use App\Models\WishlistArticle;
use Illuminate\Http\Request;

class AddArticleController extends Controller
{
    // Add an article to the wishlist
    public function addArticle(Request $request) {
        $listId = $request->wishlist_id;
        $articleId = $request->article_id;

        $id = new WishlistArticle();
        $id->wishlist_id = $listId;
        $id->article_id = $articleId;
        $id->save();

        return redirect(route('newArticle' , $listId));
    }
}
