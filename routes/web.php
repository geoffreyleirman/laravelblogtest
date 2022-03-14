<?php

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


//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten aan de geauthenticeerde routes
Auth::routes(['verify'=>true]);


/*BACKEND ROUTES*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);
});
