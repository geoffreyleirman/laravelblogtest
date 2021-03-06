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
    return view('index');

});


Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');
Route::get('/post/{post:slug}', 'App\Http\Controllers\AdminPostsController@post')->name('home.post');
Route::get('/category/{category:slug}','App\Http\Controllers\AdminPostsCategoriesController@category')->name('category.category');

//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten
//aan de geautentiseerde routes
Auth::routes(['verify'=>true]);


/***BACKEND ROUTES***/


Route::group(['prefix' => 'admin', 'middleware'=> 'admin'], function(){
    Route::resource('users',App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::resource('comments',\App\Http\Controllers\AdminPostCommentsController::class);
});

Route::group(['prefix' => 'admin', 'middleware'=> ['auth','verified']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('photos',App\Http\Controllers\AdminPhotosController::class);
    Route::resource('media',App\Http\Controllers\AdminMediaController::class);
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::resource('postcategories', App\Http\Controllers\AdminPostsCategoriesController::class);
});

