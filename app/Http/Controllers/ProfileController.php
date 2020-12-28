<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function viewProfile(/*$username*/){
        //$user = User::where('username',$username)->first();
        //if(!$user){return redirect()->back();}

        $data = [

        ];

        return view('profile.view')->with($data);
    }
}
