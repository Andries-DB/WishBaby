<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Showing all wishlists & clients (Admin section)
    public function show() {
        $clients = User::all();
        $wishlists = Wishlist::all();
        return view('pages.admin.admindashboard' , [
            'clients' => $clients,
            'wishlists' => $wishlists,
        ]);
    }

}
