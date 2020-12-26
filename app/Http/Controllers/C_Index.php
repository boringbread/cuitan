<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Index extends Controller
{
    public function show() {
    	return view('pages.index');
    }

    public function showTweets() {
    	return view('pages.tweets');
    }
}
