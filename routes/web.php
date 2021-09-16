<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware('is_admin')->group(function () {
    Route::resource('/', 'AdminController');
    Route::resource('/event', 'EventController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/category', 'CategoryController');
    Route::post('/gallery/gallery-image/{id}', 'GalleryController@galleryImage')->name('gallery.image');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
