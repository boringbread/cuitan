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

// Route::get('/', function () {
//     return view('C_Index@show');
// });

Route::get('/tes','TestConnection@test');
Route::get('/user','TestConnection@users');
Route::get('/','C_Index@show')->name('index');
Route::get('/cuit','C_Index@showTweets')->name('cuitan');


//Profile Routes
Route::get('/profile/{username}','ProfileController@viewProfile')->name("profile.view");
Route::post('/profile/{id}','ProfileController@followProfile')->name("profile.follow");

//Tweet Routes
Route::get('/status/{tweet_id}','TweetController@viewTweet')->name("tweet.view");
Route::post('/tweet/post','TweetController@postTweet')->name('tweet.post');

Auth::routes();