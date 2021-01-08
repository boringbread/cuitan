<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tweets;
use App\User;

class C_Index extends Controller
{
    public function show() {

        // Join 2 collection
        // Your code Here

        $tweets = Tweets::orderBy('created_at', 'desc')->get();

        foreach($tweets as $tweet){
            $user = User::where('_id',$tweet->id_user)->first();
            $tweet->disp_name = $user->disp_name;
            $tweet->username = $user->username;
            $tweet->pphoto = $user->pphoto;
        }

    	return view('pages.index', ['tweets' => $tweets]);
    }

    public function showTweets() {
    	return view('pages.tweets');
    }

    public static function getWTF(){
        // cache()->forget('whotofollow');
        // exit();

        $whoToFollow = cache()->remember('whotofollow', 60*60, function(){
            $user = Auth::user();
            $users = User::where('_id', "!=", $user->id)->whereNotIn('_id', $user->following)->orderby('created_at', 'desc')->take(3)->get();
            return $users;
        });

        // dd($whoToFollow);
    }

    public static function refreshWTF(){
        cache()->forget('whotofollow');
        C_Index::getWTF();
    }
}
