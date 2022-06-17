<?php

namespace App\Http\Controllers\Article\delete;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\WishlistArticle;
use Illuminate\Http\Request;

class DeleteArticleController extends Controller
{
    // Delete article from wishlist
    public function deleteListArticle(Request $request) {
        $listId = $request->wishlist_id;
        $articleId = $request->article_id;
        WishlistArticle::where('article_id',$articleId)->where('wishlist_id',$listId)->delete();
        return redirect(route('listdetail' , $listId));
    }
}
