<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Staypermit;
use App\Employee;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('Admin.contact.company.show_company',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.contact.company.create_company');
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
                'name' => 'required',
                'bod' => 'required',
                'mic' => 'required',
                'expireddate' => 'required',
                'address' => 'required',
                'proposel' => 'required',
                'proposel_local' => 'required',
                'additional' => 'required',
                'approved' => 'required',
                'approved_local' => 'required',
                'crn' => 'required',
                'company_type' => 'required',
            ]);
        $company = new Company();
        $company->name = $request->name;
        $company->bod = $request->bod;
        $company->mic = $request->mic;
        $company->expireddate = $request->expireddate;
        $company->address = $request->address;
        $company->proposel = $request->proposel;
        $company->proposel_local = $request->proposel_local;
        $company->additional = $request->additional;
        $company->approved = $request->approved;
        $company->approved_local = $request->approved_local;
        $company->crn = $request->crn;
        $company->company_type = $request->company_type;
        $company->save();
        return redirect('/create_company')->with('success_message','Successfully Created');
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
        $edit_company = Company::findOrFail($id);
        return view('Admin.contact.company.edit_company',compact('edit_company'));
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
                'name' => 'required',
                'bod' => 'required',
                'mic' => 'required',
                'expireddate' => 'required',
                'address' => 'required',
                'proposel' => 'required',
                'proposel_local' => 'required',
                'additional' => 'required',
                'approved' => 'required',
                'approved_local' => 'required',
                'crn' => 'required',
                'company_type' => 'required',
            ]);
        $update_company = Company::findOrFail($id)->update($request->all());
        return redirect('/view_company')->with('success_message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_company = Company::findOrFail($id)->delete();
        return redirect('/view_company');
    }
}
