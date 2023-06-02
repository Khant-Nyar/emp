<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    public $timestamps = false;
    protected $fillable = ['country_id','flag_name','flag_image'];
}
