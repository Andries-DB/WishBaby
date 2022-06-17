<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showLists() {
        $client = auth()->user()->id;
        $wishlists = Wishlist::where('user_id',$client)->get();

        if (request()->user()->role == 'client') {
            return view('pages.client.dashboard' , [
                'wishlists' => $wishlists
            ]);
        } else {
            return redirect()->route('admindashboard');
        }


    }
}
