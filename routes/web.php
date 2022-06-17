<?php

use App\Http\Controllers\Admin\ScrapeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Article\create\AddArticleController;
use App\Http\Controllers\Article\delete\DeleteArticleController;
use App\Http\Controllers\Article\ViewArticleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\detail\UserDetailController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\WishList\create\CreateWishlistController;
use App\Http\Controllers\WishList\delete\DeleteListController;
use App\Http\Controllers\WishList\detail\DetailWishlistController;
use App\Http\Controllers\WishList\WishListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Visitor Routes */
Route::get('/' , [UserLoginController::class, 'show'])->name('code');
Route::post('/' , [UserLoginController::class, 'login'])->name('loginwcode');
Route::get('/visitor/detaillist/{id}', [UserDetailController::class, 'UserListDetail'])->name('detaillistwcode');
Route::post('/visitor/detaillist/{id}', [UserDetailController::class, 'AddWinkelmandje'])->name('AddWinkelmandje');
Route::get('/visitor/checkout' , [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/visitor/checkout/success' , [CheckoutController::class, 'success'])->name('checkout.success');
Route::post('/webhooks/mollie',[WebhookController::class , 'handle'])->name('webhooks.mollie');

//** Admin Routes */
// Overview of clients & wishlists
Route::get('/admin', [AdminController::class, 'show'])->name('admindashboard');
Route::get('/admin/articles', [ViewArticleController::class, 'allArticles'])->name('articles');
// Scraper
Route::get('/admin/scraper', [ScrapeController::class, 'show' ])->name('scraper');
Route::post('/admin/scraper/categories' , [ScrapeController::class , 'scrapeCategories'])->name('scrape.categories');
Route::post('/admin/scraper/articles' , [ScrapeController::class , 'scrapeArticles'])->name('scrape.articles');

//** Logged in routes */
// Dashboard
Route::get('/dashboard', [DashboardController::class, "showLists"])->name(('dashboard'));
// Create new list
Route::get('/dashboard/newlist', [WishListController::class, "showListForm"])->name(('newList'));
Route::post('/dashboard/newlist', [CreateWishlistController::class, "newList"])->name(('newListPOST'));
// Getting details of wishlist
Route::get('/dashboard/{id}', [DetailWishlistController::class, "showListId"])->name(('listdetail'));
// Add articles to wishlist
Route::get('/dashboard/{id}/newarticle', [ViewArticleController::class, "showArticleForm"])->name('newArticle');
Route::post('/dashboard/{wishlist_id}/newarticle/{article_id}', [AddArticleController::class, "addArticle"])->name('addArticle');
// Delete wishlist or articles from wishlist
Route::delete('/dashboard/delete/{wishlist_id}' , [DeleteListController::class, 'deleteList'])->name('deleteList');
Route::delete('/dashboard/delete/{wishlist_id}/{article_id}', [DeleteArticleController::class, 'deleteListArticle'])->name('deleteArticle');

require __DIR__.'/auth.php';
