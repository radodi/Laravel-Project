<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Result;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index(){
    	$dancers = User::whereDoesntHave('results', function($query){
    		$query->where('arbiter_id', '=', Auth::user()->id);
    	})->where('role', '=', 'dancer')->get();
    	// dd($dancers_to_vote);
    	return view('arbiter.index', ['dancers' => $dancers]);
    }
    public function store(Request $request){

    	$result = Result::create([
    	'arbiter_id' 		=> $request->arbiter_id,
    	'first_criterion' 	=> $request->first_criterion,
    	'second_criterion' 	=> $request->second_criterion,
    	'third_criterion' 	=> $request->third_criterion,
    	'dancer_id' 		=> $request->dancer_id,
    	]);
    	return redirect()->route('vote')->with('message', 'Успешно оценихте ' . $result->dancer->name . '.');
    }
}
