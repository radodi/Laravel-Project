<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Result;
use DB;
use App\Quotation;

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
            $arbiters= User::where('role', '=','arbiter')->get();
    		$dancers = User::where('role', '=','dancer')->orderBy('name', 'desc')->get();
    		return view('admin.results.index', ['dancers' => $dancers],['arbiters' => $arbiters]);
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
    			->where('arbiter_id', '=', $result->arbiter_id)->update(['invalid' =>true]);
                //calculate summ
              $valid_results=Result::where('invalid', '=', 0)->get();
              foreach ($valid_results as $valid_result) {
                   $first_criterion = DB::table('results')
                   ->where('dancer_id', '=', $valid_result->dancer_id)
                   ->avg('first_criterion');
                   $second_criterion = DB::table('results')
                   ->where('dancer_id', '=', $valid_result->dancer_id)
                   ->avg('second_criterion');
                   $third_criterion = DB::table('results')
                   ->where('dancer_id', '=', $valid_result->dancer_id)
                   ->avg('third_criterion');
              
                     $sum= $first_criterion+$second_criterion+$third_criterion;
                     $sum++;
                    $final=Profile::where('user_id', '=', $valid_result->dancer_id)->update(['result' => $sum]);
              }
        }
              
              
    	}
    	return redirect()->route('result');
    }
    public function sumResult(){
         $dancers = User::where('role', '=', 'dancer')->get();
        return view('welcome', ['dancers' => $dancers]);
    }
    
}
