<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staypermit extends Model
{
	protected $table = 'staypermits';
    public $timestamps = false;
    protected $fillable=[
    	'company_id','holder_id','position_id','stay','fromdate','todate','approveddate','canceleddate','stay_delete','type','status','mic_appointed','mic_letter_number','submitted_time','resubmitted_time'
    ];
    public function companies(){
    	return $this->belongsto('App\Company','company_id');
    }
    public function employees(){
    	return $this->belongsto('App\Employee','holder_id');
    }
    public function positions(){
    	return $this->belongsto('App\Position','position_id');
    }
    public function depends(){
        return $this->belongsTo('App\Depend','holder_id');
    }
}
