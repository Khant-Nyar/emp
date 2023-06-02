<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depend;
use App\Country;
use App\Employee;
use App\Relationship;
use App\Staypermit;
class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depend=Depend::all();
        $country=Country::all();
        $employee=Employee::all();
        $relationship=relationship::all();
        return view('Admin.contact.Dependent.view_dependent',compact('depend','country','employee','relationship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'depend_name'=>'required',
            'passport'=>'required'
        ]);
        //passport duplicate check
        $previous_passports = Depend::get('passport');
        foreach($previous_passports as $previous_passport){
            if($request->passport==$previous_passport['passport']){
                return redirect('view_dependent')->with('error_message','Passport Number Already Exist');
            }
        }
        $insertedId = Depend::create($request->all());
        $depend_id = $insertedId->id; 
        $depend_emp = $insertedId->employee_id;
        $related_company = Staypermit::where('holder_id',$depend_emp)->get('company_id');
        $related_company=$related_company[0]->company_id;
    
        $stay = new Staypermit();
        $stay->holder_id = $depend_id;
        $stay->company_id = $related_company;
        $stay->position_id = 0 ;
        $stay->save();
        return redirect('view_dependent')->with('success_message','Successfullly Inserted');
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
        $depend=Depend::find($id);
        $country=Country::all();
        $employee=Employee::all();
        $relationship=relationship::all();
        return view('Admin.contact.Dependent.update_dependent',compact('depend','country','employee','relationship'));
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
        $this->validate($request,[
            'depend_name'=>'required',
            'passport'=>'required'
        ]);
        Depend::findOrFail($id)->update($request->all());
        return redirect('view_dependent')->with('success_message','Successfullly Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Depend::findOrFail($id)->delete();
        Staypermit::where('holder_id',$id)->where('position_id',0)->delete();
        return redirect('view_dependent');
    }
}
