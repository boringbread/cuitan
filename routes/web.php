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
Route::delete('/profile/delete/', 'ProfileController@deleteAccount')->name('profile.delete');
Route::post ('/profile/search','ProfileController@searchProfile')->name("profile.search");
Route::post('/profile/{id}','ProfileController@followProfile')->name("profile.follow");
Route::get('/profile/{username}','ProfileController@viewProfile')->name("profile.view");
Route::get('/profile/{username}/following/', 'ProfileController@getFollowing')->name('profile.following');
Route::get('/profile/{username}/follower/', 'ProfileController@getFollower')->name('profile.follower');

//Tweet Routes
Route::post('/tweet/post','TweetController@postTweet')->name('tweet.post');
Route::get('/status/{tweet_id}','TweetController@viewTweet')->name("tweet.view");
Route::put('/tweet/delete/{tweet_id}', 'TweetController@deleteTweet')->name('tweet.delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');