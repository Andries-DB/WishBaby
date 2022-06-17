<?php

namespace App\Http\Controllers\WishList\detail;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\WishlistArticle;
use Illuminate\Http\Request;

class DetailWishlistController extends Controller
{
    public function showListId(Request $request) {
        //* Details of Wishlist + Already Added Articles */
        $listId = $request->id;
        $wishlist = Wishlist::where('id',$listId)->get();

        $WishlistArticles = WishlistArticle::where('wishlist_id', $listId)->get();
        return view('pages.client.detail', [
            'wishlist' => $wishlist,
            'WishlistArticles' => $WishlistArticles
        ]);
    }
}
