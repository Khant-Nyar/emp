<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Staypermit;
use App\Country;
use App\Employee;
class tester extends Controller
{
	public function getcom(){
		$holders = Staypermit::where('company_id',1)->get('holder_id');
		return view('tester',compact('holders'));
	}
	public function index(){
		$countries = Country::all();
		return view('tester',compact('countries'));
	}
}
