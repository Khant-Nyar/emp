<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Position;
use App\Country;
use App\Staypermit;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        $country = Country::all();
        $position = Position::all();
        $company = Company::all();
        return view('Admin.contact.employee.employee',compact('employee','country','position','company'));
        
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
            'name'=>'required',
            'passport'=>'required'
        ]);
        //passport duplicate check
        $previous_passports = Employee::get('passport');
        foreach($previous_passports as $previous_passport){
            if($request->passport==$previous_passport['passport']){
                return redirect('view_employee')->with('error_message','Passport Number Already Exist');
            }
        }

        $employee = new Employee();
        $employee->name = $request->name ;
        $employee->country_id = $request->country_id ;
        $employee->passport = $request->passport ;
        $position = $request->position_id;
        if($position == 1 or $position == 2){
            $employee->bod = 1;
        }
        else{
            $employee->bod = $request->bod ;
        }
        $employee->save();
        $insertedId = $employee->id;

        $staypermit = new Staypermit();
        $staypermit->position_id = $request->position_id;
        $staypermit->company_id = $request->company_id;
        $staypermit->holder_id = $insertedId;
        $staypermit->save();
        return redirect('view_employee')->with('success_message','Successfully Created Employee');
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
        $employee=Employee::find($id);
        $country = Country::all();
        return view('Admin.contact.employee.edit_employee',compact('employee','country'));
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
            'name'=>'required',
            'passport'=>'required'
        ]);
        
        Employee::findOrFail($id)->update($request->all());
        return redirect('view_employee')->with('success_message','Successfully Updated Employee');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        Staypermit::where('holder_id',$id)->whereNotIn('position_id',[0])->delete();
        // $employee=Employee::find($id);
        // $employee->delete();
        return redirect('view_employee')->with('success_message','Successfully Delete Employee');;
    }
}
