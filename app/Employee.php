<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'id ',
        'name',
        'country_id',
        'passport',
        'employee_delete',
        'bod'

    ];
    public function countries(){
    	return $this->belongsTo('App\Country','country_id');
    }
    public function staypermits(){
        return $this->hasOne('App\Staypermit','holder_id','id');
    }
    
}
