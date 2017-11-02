<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Result;

class HomeController extends Controller
{

    public function index()
    {   
        $dancers = User::where('role', '=', 'dancer')->get();
        $arbiters = User::where('role', '=', 'arbiter')->get();
        $results = Profile::where('result', '!=', null)->orderBy('result', 'desc')->get();
        return view('welcome', ['results'=>$results, 'arbiters'=>$arbiters, 'dancers'=>$dancers]);
    }
}
