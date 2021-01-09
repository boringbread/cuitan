<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tweets;
use App\User;

class C_Index extends Controller
{

    /*
        Menampilkan halaman utama dari aplikasi
        url:    /home
        contoh penggunaan dynamic route: href="{{route(home)}}"
    */
    public function show() {
        $tweets = Tweets::orderBy('created_at', 'desc')->get();

        foreach($tweets as $tweet){
            $user = User::where('_id',$tweet->id_user)->first();
            $tweet->disp_name = $user->disp_name;
            $tweet->username = $user->username;
            $tweet->pphoto = $user->pphoto;
        }

    	return view('pages.index', ['tweets' => $tweets]);
    }

    /*
        Menampilkan halaman cuitan tertentu
    */
    public function showTweets() {
    	return view('pages.tweets');
    }

    public static function getWTF(){
        $whoToFollow = cache()->remember('whotofollow', 60*60, function(){
            $user = Auth::user();
            $users = User::where('_id', "!=", $user->id)->whereNotIn('_id', $user->following)->orderby('created_at', 'desc')->take(3)->get();
            return $users;
        });
    }

    public static function refreshWTF(){
        cache()->forget('whotofollow');
        C_Index::getWTF();
    }

    public static function loginRefreshWTF(){
        cache()->forget('whotofollow');
        C_Index::getWTF();
        return redirect(route('index'));
    }
}
