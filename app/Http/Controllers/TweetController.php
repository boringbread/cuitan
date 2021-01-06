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
        if($tweet->reply_anc){
            $ancTweet = Tweets::where('_id',$tweet->reply_anc)->first();
            if($ancTweet){
                $user_anc = User::where('_id',$ancTweet->id_user)->first();
                $ancTweet->disp_name = $user_anc->disp_name;
                $ancTweet->username = $user_anc->username;
            }
            $tweet->anc = $ancTweet;
        }
        if($tweet->reply_prede){
            //buat array baru
            $predeArray = array();
            
            //foreach elemen pada reply prede
            foreach($tweet->reply_prede as $prede){
                $predeTweets = Tweets::where('_id',$prede)->first();
                if($predeTweets){
                    $user_prede = User::where('_id',$tweet->id_user)->first();
                    $predeTweets->disp_name = $user_prede->disp_name;
                    $predeTweets->username = $user_prede->username;
                    array_push($predeArray, $predeTweets);
                }
            }

            $tweet->prede = $predeArray;
            $tweet->count_prede = count($tweet->prede);
        }
        
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

    public function replyTweet(Request $request){
        //add middleware
        $id = $request->input('reply_id');
        $tweet = Tweets::where('_id', $id)->first();
        $newTweet = new Tweets();
        $user = Auth::user();

        // dd($tweet);
        $newTweet->text = $request->input('reply_data');
        $newTweet->id_user = $user->id;
        $newTweet->date_added = date("d/m/Y h:i:s");
        $newTweet->reply_anc = $tweet->id;
        $newTweet->save();

        $tweet->push('reply_prede',$newTweet->id, true);
        $tweet->save();

        return redirect(route('tweet.view',$tweet->id));
    }

    public function deleteTweet(Request $request, $id){
        $tweet = Tweets::where('_id', $id)->first();

        $ancTweet = Tweets::where('_id',$tweet->reply_anc)->first();
        $predeTweets = array();

        foreach($tweet->reply_prede as $id){
            $prede = Tweets::where('_id',$id)->first();
            if($prede){
                $prede->delete();
            }
        }
        if($ancTweet){

        }
        $tweet->delete();

        return redirect(route('index'));
    }
    
}
