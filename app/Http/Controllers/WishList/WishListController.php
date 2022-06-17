<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishListRequest;
use App\Models\Article;
use App\Models\WishList;
use App\Models\WishlistArticle;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    // View form to create wishlist
    public function showListForm() {
        return view('pages.client.create.createlist');
    }
}
