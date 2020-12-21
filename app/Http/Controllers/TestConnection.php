<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestModel;

class TestConnection extends Controller
{
    public function test() {
    	$users = TestModel::all();
    	echo $users;
    }
}
