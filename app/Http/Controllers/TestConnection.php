<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweets;
use App\User;

class TestConnection extends Controller
{
    public function test() {
        $tweets = Tweets::all();
        foreach($tweets as $tweet){
            $user = User::where('_id',$tweet->id_user)->first();
            $tweet->name = $user->disp_name;
        }
    	echo $tweets;
    }

    public function users(){
        $users = User::all();
        return $users;
    }
}
