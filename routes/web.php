<?php

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

Route::get('articles', 'ArticleController@index')->name('articles.index');
Route::get('articles/create', 'ArticleController@create')->name('articles.create');
Route::post('articles', 'ArticleController@store')->name('articles.store');
Route::get('articles/{article}','ArticleController@show')->name('articles.show');
Route::get('articles/{article}/edit','ArticleController@edit')->name('articles.edit');
Route::match(['PUT', 'PATCH'], 'articles/{article}','ArticleController@update')->name('articles.update');
Route::delete('articles/{article}', 'ArticleController@destroy')->name('articles.destroy');
Route::post('comments', 'CommentController@store')->name('comments.post');

Route::post('like','FavoriteController')->name('favorite.like');
Route::get('notify',function () {
    $user = \App\User::first();
    $article = \App\Article::first();

    $user->notify(new \App\Notifications\ArticlePublished($article));
});