<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Result;

class ResultController extends Controller
{	
	public $isAllVoted;

	public function __construct()
	{
		$arbiters_count = User::where('role', '=','arbiter')->get()->count();
		$dancers_count = User::where('role', '=','dancer')->get()->count() ;
		$votes_count = Result::count();
		if($votes_count == $arbiters_count * $dancers_count){
    		$this->isAllVoted = true;
    	} else {
    		$this->isAllVoted = false;
    	}
    
	}

    public function index()
    {
    	if($this->isAllVoted){
    		$dancers = User::where('role', '=','dancer')->orderBy('name', 'desc')->get();
    		return view('admin.results.index', ['dancers' => $dancers]);
    	}
    		return view('admin.results.index', ['message' => 'Арбитрите не са приключили с гласуването.']);

    }
    public function checkInvalid($id){
    	$min = Result::minValFromVotes($id);
    	$max = Result::maxValFromVotes($id);

    	$results = Result::where('dancer_id','=',$id)->get();
    	foreach ($results as $result) {
    		$invalid = false;
    		switch ($min) {
    			case ($result->first_criterion == $min && $result->second_criterion == $min) :
    				$invalid = true;
    				break;
    			case ($result->first_criterion == $min && $result->third_criterion == $min) :
    				$invalid = true;
    				break;
    				case ($result->second_criterion == $min && $result->third_criterion == $min) :
    				$invalid = true;
    				break;
    		}
    		switch ($max) {
    			case ($result->first_criterion == $max && $result->second_criterion == $max) :
    				$invalid = true;
    				break;
    			case ($result->first_criterion == $max && $result->third_criterion == $max) :
    				$invalid = true;
    				break;
    				case ($result->second_criterion == $max && $result->third_criterion == $max) :
    				$invalid = true;
    				break;
    		}

    		if($invalid){
    			$invalid_vote=Result::where('dancer_id', '=', $result->dancer_id)
    			->where('arbiter_id', '=', $result->arbiter_id)->update(['invalid' => true]);
    		}
    	}
    	return redirect()->route('result');
    }
    
}
