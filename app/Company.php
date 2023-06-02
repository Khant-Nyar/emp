<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','bod','mic','expireddate','address','proposel','proposel_local','additional','approved','approved_local','crn','company_type','company_delete'];
}
