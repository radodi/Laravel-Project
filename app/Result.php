<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Result extends Model
{

    public $incrementing    = false;
    protected $primariKey = ['arbiter_id', 'dancer_id'];
    protected $fillable = [
    	'arbiter_id', 
    	'first_criterion', 
    	'second_criterion', 
    	'third_criterion',
    	'dancer_id',
        'invalid',
    ];

    public function dancer(){
    	return $this->belongsTo('App\User','dancer_id', 'id');
    }
    public function arbiter(){
        return $this->belongsTo('App\User','arbiter_id', 'id');
    }


    public static function minValFromVotes($id){
        $results = DB::select('select first_criterion, second_criterion, third_criterion from results where dancer_id = :id', ['id' => $id]);
        $minval=10;
        // dd($results);
        foreach ($results as $row ) {

            if ($row->first_criterion<$row->second_criterion && $row->first_criterion<$minval ) {
               $minval=$row->first_criterion;
            } elseif ($row->second_criterion<$row->third_criterion && $row->second_criterion<$minval) {
               $minval=$row->second_criterion;
            } elseif ($row->third_criterion<$minval){
               $minval=$row->third_criterion;
            }
        }
        return $minval;
    }

    public static function maxValFromVotes($id){
        $results = DB::select('select first_criterion, second_criterion, third_criterion from results where dancer_id = :id', ['id' => $id]);
        $maxval=1;
        foreach ($results as $row ) {

            if ($row->first_criterion > $row->second_criterion && $row->first_criterion>$maxval ) {
               $maxval=$row->first_criterion;
            } elseif ($row->second_criterion > $row->third_criterion && $row->second_criterion>$maxval) {
               $maxval=$row->second_criterion;
            } elseif ($row->third_criterion>$maxval){
               $maxval=$row->third_criterion;
            }
        }
        return $maxval;
    }
}
