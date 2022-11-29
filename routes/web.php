<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[BlogController::class,'blog'])->name('/');
Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add-blog');
Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new-blog');
Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage-blog');
Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
Route::post('/delete-blog',[BlogController::class,'deleteBlog'])->name('delete-blog');
Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit-blog');
Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update-blog');
Route::get('/all-blogs',[BlogController::class,'allBlog'])->name('all-blogs');
Route::get('/blog-details/{slug}',[BlogController::class,'blogDetails'])->name('blog-details');
Route::get('/g-blog-details/{g_slug}',[BlogController::class,'blogGDetails'])->name('g-blog-details');
Route::get('/contact-us',[BlogController::class,'contactUs'])->name('contact-us');
Route::post('/contact-us', [BlogController::class, 'store'])->name('contact.us.store');

Route::get('/guest',[GuestController::class,'home'])->name('guest');
Route::post('/new-g-blog',[GuestController::class,'saveGBlog'])->name('new-g-blog');
Route::get('/guest-manage-blog',[GuestController::class,'manageBlog'])->name('guest-manage-blog');
Route::get('/status-g/{id}',[GuestController::class,'statusG'])->name('status-g');
Route::post('/delete-g-blog',[GuestController::class,'deleteGBlog'])->name('delete-g-blog');
Route::get('/edit-g-blog/{id}',[GuestController::class,'editGBlog'])->name('edit-g-blog');
Route::post('/update-g-blog',[GuestController::class,'updateGBlog'])->name('update-g-blog');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'home'])->name('dashboard');
});
