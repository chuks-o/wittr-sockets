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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('personal/posts/{user}', 'UserController@getPersonalTweets');
Route::get('profile/{user}', 'UserController@show')->name('user.show');
Route::get('profile/{user}/follow', 'UserController@follow')->name('user.follow');
Route::get('profile/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');
Route::get('get-follow-status/{user}', 'UserController@getUserFollowingStatus');
Route::get('get-trends', 'TrendController@getTrends');
Route::get('hashtag/{trend}', 'TrendController@index');
Route::get('get-trending-tweets/{trend}', 'TrendController@getTimeLineTrends');
Route::get('posts/{post}/comments', 'CommentController@getPostComments');
Route::post('save-tweet','PostController@store');
Route::post('posts/{post}/favorite', 'LikeController@favorite');
Route::post('posts/{post}/unfavorite', 'LikeController@unFavorite');
Route::post('save-trend', 'TrendController@saveTrend');
Route::post('posts/{post}/comments', 'CommentController@createComment');
