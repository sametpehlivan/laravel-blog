<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| back
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/admin')->name('admin.')->middleware('logged')->group(function (){
    Route::get('/login','App\Http\Controllers\Back\Dashboard@loginget')->name('login.get');
    Route::post('/login','App\Http\Controllers\Back\Dashboard@loginpost')->name('login.post');
});
Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function (){

    Route::resource('articles',\App\Http\Controllers\Back\ArticleController::class);
    Route::get('/panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    Route::get('/logout','App\Http\Controllers\Back\Dashboard@logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','App\Http\Controllers\Front\Articles@index')->name('homepage');
Route::prefix('/contact')->group(function (){
    Route::get('/','App\Http\Controllers\Front\Contact@contactget')->name('contact');
    Route::post('/','App\Http\Controllers\Front\Contact@contactpost')->name('contact.post');
});
Route::prefix('/articles')->group(function (){
    Route::get('/','App\Http\Controllers\Front\Articles@index');
    Route::get('/{slug}','App\Http\Controllers\Front\Articles@show')->name('articlesbycategory');
    Route::get('/detail/{slug}','App\Http\Controllers\Front\Articles@single')->name('articledetails');
});
Route::get('/{page}','App\Http\Controllers\Front\Home@page')->name('pages');




