<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Tweets;

class ProfileController extends Controller
{
    public function viewProfile($username){
        $user = User::where('username',$username)->first();

        if(!$user){return redirect(route('index'));}

        $tweets = Tweets::where('id_user',$user->id)->get();

        foreach($tweets as $tweet){
            $tweet->disp_name = $user->disp_name;
            $tweet->username = $user->username;
        }

        $role = "default";

        if(Auth::user()->id == $user->id){
            $role = "owner";
        }else{
            $role = "visit";
        }

        $data = [
            'user'=>$user,
            'tweets'=>$tweets,
            'role'=>$role
        ];

        return view('profile.view')->with($data);
    }
//kasi unfollow
    public function followProfile($id){
        $user = Auth::user();

        $toFollow = User::where('_id',$id)->first();

        //punya si follower
        $user->push('following', $id, true);
        $user->save();
        
        //punya to Follow
        $toFollow->push('followers',$user->id, true);
        $toFollow->save();
    }
}
