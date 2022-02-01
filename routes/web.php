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
    return view('guest.welcome');
})->name('home');

Route::resource('posts', 'Guest\PostController')->parameters([
    'posts:id' => 'post:slug'
])->only([
    'index', 'show'
])->names([
    'index'=> 'guest.index.posts',
    'show'=> 'guest.show.post'
]);


Route::get('categories/{category:slug}/posts/', 'Guest\CategoryController@posts')->name('guest.categories.posts');
Route::get('tags/{tag:slug}/posts/', 'Guest\TagController@posts')->name('guest.tags.posts');

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('/tags', 'Tags\TagController');
    Route::resource('/categories', 'Categories\CategoryController');
    Route::resource('/posts', 'Posts\PostController');
});


