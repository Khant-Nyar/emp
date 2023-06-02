<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depend extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'id',
        'depend_name',
        'country_id',
        'passport',
        'employee_id',
        'relationship_id',
        'depend_delete'

    ];
    public function countries(){
        return $this->belongsto('App\Country','country_id');
    }
    public function employees(){
        return $this->belongsto('App\Employee','employee_id');
    }
    public function relationships(){
        return $this->belongsto('App\Relationship','relationship_id');
    }

    public function staypermits(){
        return $this->hasOne('App\Staypermit','holder_id','id');
    }
}
