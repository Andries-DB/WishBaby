<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Error;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    // View dashboard
    public function show()  {
        return view('pages.user.code');
    }
    // Login to a wishlist with given private code (Visitor section)
    public function login(Request $request) {


        try {
            $code = $request->code;
            $codeWishlist = Wishlist::where('code',$code)->first();
            try {
                $wishListid = $codeWishlist->id;
            }
            catch (ModelNotFoundException $exception) {
                report($exception);
                return back()->withError($exception->getMessage())->withInput();
            }

        } catch (ModelNotFoundException $exception) {
            report($exception);
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect(route('detaillistwcode' , $wishListid));
    }
}
