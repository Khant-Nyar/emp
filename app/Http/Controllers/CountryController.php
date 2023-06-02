<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Flag;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::all();
        $flag = Flag::all();
        return view('Admin.contact.country.country',compact('country','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'country_name' => 'required',
            ]);
        $previous_countries = Country::all();
        foreach($previous_countries as $previous_country){
            if($request->country_name==$previous_country['country_name']){
                return redirect('/country')->with('error_message','Country Name Already Exist');
            }
        }      
        $flags = Flag::get();
        foreach($flags as $flag){
            if(strpos( strtolower($flag->flag_name),strtolower($request->country_name)) !== false){
                Country::create($request->all());
                return redirect('/country')->with('success_message','Successfully Created');
            } 
        }
        return redirect('/country')->with('error_message','Invalid Country Name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_country = Country::find($id);
        return view('Admin.contact.country.edit_country',compact('edit_country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'country_name' => 'required',
            ]);
        $flags = Flag::get();
        $edit_country = Country::find($id);
        foreach($flags as $flag){
            if(strpos( strtolower($flag->flag_name),strtolower($request->country_name)) !== false){
                Country::find($id)->update($request->all());
                return redirect('/country')->with('success_message','Successfully Updated');
            } 
        }
        return redirect('/country')->with('error_message','Invalid Country Name');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect('/country');
    }
}
