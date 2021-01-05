<?php

namespace App\Http\Controllers;

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
        }

    	return view('pages.index', ['tweets' => $tweets]);
    }

    public function showTweets() {
    	return view('pages.tweets');
    }
}
