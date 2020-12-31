<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweets;

class C_Index extends Controller
{
    public function show() {

        // Join 2 collection
        // Your code Here

        $tweets = Tweets::get();

    	return view('pages.index', ['tweets' => $tweets]);
    }

    public function showTweets() {
    	return view('pages.tweets');
    }
}
