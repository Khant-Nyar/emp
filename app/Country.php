<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	public $timestamps = false;
    protected $fillable = ['country_name','country_Delete'];

    public function employees(){
    	return $this->hasMany('App\Employee','country_id');
    }
    public function depends(){
    	return $this->hasMany('App\Depend','country_id');
    }
}
