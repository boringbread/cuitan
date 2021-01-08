<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tweets;
use App\User;

class TweetController extends Controller
{
    /*
        Melihat Tweet berdasarkan parameter ID
        url:    /status/{tweet_id}
        contoh penggunaan dynamic route: href="{{route('tweet.view',$id)}}"
    */
    public function viewTweet($tweet_id){
        //mencari tweet pada database(where), dan mengambil hasil pencariannya(first)
        $tweet = Tweets::where('_id',$tweet_id)->first();

        //jika tweet tidak ditemukan, arahkan user ke halaman index
        if(!$tweet){
            return redirect(route('index'));
        }

        //Ambil Tweet Ancestor dan Predecessor jika ada, dan lakukan append pada objek Tweet yang ditemukan tadi
        if($tweet->reply_anc){
            //cari tweet ancestor melalui IDnya.
            $ancTweet = Tweets::where('_id',$tweet->reply_anc)->first();

            //Jika ditemukan, tambahkan field-field yang diperlukan oleh tweet seperti display name dan username.
            if($ancTweet){

                //dapatkan objek user pemilik tweet untuk mendapatkan informasi disp_name dan username
                $user_anc = User::where('_id',$ancTweet->id_user)->first();

                //append data objek user pemilik pada objek tweet
                $ancTweet->disp_name = $user_anc->disp_name;
                $ancTweet->username = $user_anc->username;
                $ancTweet->pphoto = $user_anc->pphoto;
            }
            $tweet->anc = $ancTweet;
        }
        if($tweet->reply_prede){
            //buat array baru
            $predeArray = array();
            
            //foreach elemen pada reply prede, tahap ini mirip dengan reply_anc di atas
            foreach($tweet->reply_prede as $prede){
                $predeTweets = Tweets::where('_id',$prede)->first();
                if($predeTweets){
                    $user_prede = User::where('_id',$predeTweets->id_user)->first();
                    // dd($predeTweets);
                    $predeTweets->disp_name = $user_prede->disp_name;
                    $predeTweets->username = $user_prede->username;
                    $predeTweets->pphoto = $user_prede->pphoto;
                    //masukan objek ke array baru
                    array_push($predeArray, $predeTweets);
                }
            }
            //append array pada objek tweet
            $tweet->prede = $predeArray;
            $tweet->count_prede = count($tweet->prede);
        }
        
        //Lengkapi data yang dibutuhkan tweet
        $user = User::where('_id',$tweet->id_user)->first();
        $tweet->disp_name = $user->disp_name;
        $tweet->username = $user->username;
        $tweet->pphoto = $user->pphoto;

        //kembalikan tampilan pages.tweet dan render tampilan dengan data $tweet
        return view('pages.tweets')->with('tweet',$tweet);
    }

    /*
        Mem-post Tweet baru (bukan reply / retweet)
        url:    /tweet/post
    */
    public function postTweet(Request $request){
        #todo: - tambahkan ::middleware pada route delete
        #      - validasi isi field tweet (length tweet)
        $user = Auth::user();
        $tweet = new Tweets();

        $tweet->text = $request->input('text');
        $tweet->id_user = $user->id;
        $tweet->date_added = date("d/m/Y h:i:s");

        //simpan tweet ke database
        $tweet->save();

        //arahkan user ke halaman index
        return redirect(route('index'));
    }

    /*
        Membuat Tweet Reply
    */
    public function replyTweet(Request $request){
        #todo: - tambahkan ::middleware pada route reply
        #      - validasi isi field tweet (length tweet)

        //ambil parameter ID Tweet yang direply dari form
        $id = $request->input('reply_id');
        //cari tweet berdasarkan parameter ID Tweet
        $tweet = Tweets::where('_id',$id)->first();
        //lakukan cek jika tweet ada, dan arahkan jika tidak ada
        /*belum diimplementasikan*/

        $newTweet = new Tweets();
        $user = Auth::user();

        //lengkapi data tweet baru
        $newTweet->text = $request->input('reply_data');
        $newTweet->id_user = $user->id;
        $newTweet->date_added = date("d/m/Y h:i:s");
        $newTweet->reply_anc = $tweet->id;
        //simpan data tweet baru pada database
        $newTweet->save();

        //tambahkan ID Tweet baru dalam array predecessor tweet yang direply
        $tweet->push('reply_prede',$newTweet->id, true);
        $tweet->save();

        //arahkan kembali user pada halaman tweet yang direply
        return redirect(route('tweet.view',$tweet->id));
    }

    /*
        Menghapus Tweet
    */
    public function deleteTweet(Request $request, $id){
        #todo: tambahkan ::middleware pada route delete

        //cari tweet berdasarkan ID
        $tweet = Tweets::where('_id', $id)->first();

        //cek apakah tweet benar milik user yang login saat ini (Auth::user())
        /*belum diimplementasikan*/

        //hapus tweet dari database
        $tweet->delete();
        
        //arahkan user ke halaman index
        return redirect(route('index'));
    }

    
    
}
