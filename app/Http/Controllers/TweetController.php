<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tweets;
use App\User;

class TweetController extends Controller
{
    public function viewTweet($tweet_id){
        $tweet = Tweets::where('_id',$tweet_id)->first();
        if(!$tweet){
            return redirect(route('index'));
        }
        //todo: ambil kalo ada, parentnya, replynya
        
        /*getting user data*/
        $user = User::where('_id',$tweet->id_user)->first();
        $tweet->disp_name = $user->disp_name;
        $tweet->username = $user->username;

        return view('pages.tweets')->with('tweet',$tweet);
    }

    public function postTweet(Request $request){
        //todo: validate AUTH & validate tweet FIELDS
        $user = Auth::user();
        $tweet = new Tweets();

        $tweet->text = $request->input('text');
        $tweet->id_user = $user->id;
        $tweet->date_added = date("d/m/Y h:i:s");
        $tweet->save();

        return redirect(route('index'));
    }

    public function deleteTweet(Request $request, $id){
        $tweet = Tweets::where('_id', $id)->first();
        $tweet->delete();

        return redirect(route('index'));
    }
    
}
