<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweets;

class TestConnection extends Controller
{
    public function test() {
    	$users = Tweets::all();
    	echo $users;
    }
}
