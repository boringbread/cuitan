<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Tweets;

class ProfileController extends Controller
{

    /*
        Melihat Profile berdasarkan parameter username
        url:    /profile/{username}
        contoh penggunaan dynamic route: href="{{route('profile.view',$username)}}"
    */
    public function viewProfile($username){
        //cari user berdasarkan username
        $user = User::where('username',$username)->first();

        
        if(!$user){return redirect(route('index'));}
        
        $tweets = Tweets::where('id_user',$user->id)->orderBy('created_at', 'desc')->get();

        if($user->followers)$user->follower_count = count($user->followers);
        if($user->following)$user->following_count = count($user->following);
        $user->tweet_count = count($tweets);

        //jika user tidak ditemukan, arahkan kembali ke halaman index
        if(!$user){return redirect(route('index'));}

        //ambil tweet milik user tersebut
        $tweets = Tweets::where('id_user',$user->id)->get();

        //lengkapi data yang diperlukan tweet
        foreach($tweets as $tweet){
            $tweet->disp_name = $user->disp_name;
            $tweet->username = $user->username;
        }

        //role pada lihat profile
        $role = "default";

        //jika sudah login
        if(Auth::check()){
            //jika current user (login) merupakan pemilik user yang dilihat, role adalah owner
            if(Auth::user()->id == $user->id){
                $role = "owner";
            }
            //jika bukan, maka hanya 'visit'or
            else{
                $role = "visit";
            }
        }

        //bungkus data seperti gilang membungkus korbannya
        //sangat rapih
        $data = [
            'user'=>$user,
            'tweets'=>$tweets,
            'role'=>$role
        ];

        return view('profile.view')->with($data);
    }
    
    /*
        Follow user tertentu berdasarkan id
        url:   /profile/{id}
        contoh penggunaan dynamic route: href="{{route('profile.follow',$id)}}"
    */
    public function followProfile($id){
        #Todo: - tambahkan ::middleware pada route
        $user = Auth::user();

        //cari profile user yang ingin difollow
        $toFollow = User::where('_id',$id)->first();

        //batalkan follow jika tidak ditemukan profile user
        if(!$toFollow){return redirect()->back();}

        //tambahkan id user yang ingin difollow pada array following diri sendiri (login)
        $user->push('following', $id, true);
        $user->save();
        
        //tambahkan id user diri sendiri pada array follower user yang ingin difollow
        $toFollow->push('followers',$user->id, true);
        $toFollow->save();

        //kembalikan user ke halaman profil
        return redirect( route('profile.view', $toFollow->username) );
    }

    /*
        Unfollow user tertentu berdasarkan id
        url:   /profile/unfollow/{id}
        contoh penggunaan dynamic route: href="{{route('profile.unfollow',$id)}}"
    */
    public function unfollowProfile($id){
        /* 
            INI GW MASI ASAL COPAS DOANG WKWKWK
            BELOM ADA DI ROUTE, VIEW
         */

        // #todo: ::middleware pada route
        
        // $user = Auth::user();

        // //cari profile user yang ingin diunfollow
        // $toUnfollow = User::where('_id',$id)->first();

        // //batalkan unfollow jika tidak ditemukan profile user
        // if(!$toUnfollow){return redirect()->back();}

        // //tambahkan id user yang ingin diunfollow pada array following diri sendiri (login)
        // $user->pull('following', $id, true);
        // $user->save();
        
        // //tambahkan id user diri sendiri pada array follower user yang ingin difollow
        // $toUnfollow->pull('followers',$user->id, true);
        // $toUnfollow->save();
    }

    public function updateProfile(Request $request){
        $user = Auth::user();

        $user->disp_name = $request->input('disp_name');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect(route('profile.view',$user->username));
    }

    public function deleteAccount(){
        $user = Auth::user();
        $user->delete();

        $tweets = Tweets::where("id_user",$user->id)->get();

        foreach($tweets as $tweet){
            $tweet->delete();
        }

        return redirect(route('login'));
    }

    public function getFollowing($username){
        $user = User::where('username', $username)->first();
        $following = array();

        if($user->following != NULL){
            foreach ($user->following as $item) {
                $follower = User::where('_id', $item)->first();
                $follower->count_following = $this->countFollowing($follower->username);
                $follower->count_follower = $this->countFollower($follower->username);
                array_push($following, $follower);
            }
        }
        
        return view('pages.follow', ['follow' => $following, 'username' => $username]);
    }

    public function getFollower($username){
        $user = User::where('username', $username)->first();
        $follower = array();

        if($user->followers != NULL){
            foreach ($user->followers as $item) {
                $following = User::where('_id', $item)->first();
                $following->count_following = $this->countFollowing($following->username);
                $following->count_follower = $this->countFollower($following->username);
                array_push($follower, $following);
            }    
        }

        return view('pages.follow', ['follow' => $follower, 'username' => $username]);
    }

    public function searchProfile(Request $request){
        $search = $request->input('search');
        $user = User::where('username',$search)->first();
        
        if(!$user){return redirect(route('index'));}

        return redirect(route('profile.view', $user->username));
    }

    private function countFollowing($username){
        $user = User::where('username', $username)->first();
        if($user->following)return count($user->following);
        return 0;
    }

    private function countFollower($username){
        $user = User::where('username', $username)->first();
        if($user->followers)return count($user->followers);
        return 0;
    }
    
}
