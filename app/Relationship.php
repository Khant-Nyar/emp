<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public $timestamps = false;
    protected $fillable = ['relationship_name','relationship_delete'];
}
