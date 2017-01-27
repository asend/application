<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function getHome(){
    	//$data = User::all();
    	$data = User::paginate(15);
    	return view('user.index')->with('data',$data);
    }

    public function getHomes(){
    	$data = User::all();
    	return view('user.u')->with('data',$data);
    }
}
