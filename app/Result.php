<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    	return $this->belongsTo('App\User');
    }
    public function arbiter(){
        return $this->belongsTo('App\User');
    }

}
