<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App\Position;

use App\Staypermit;
class StaypermitController extends Controller
{
    
    public function employee_approve()
    {
        $company=Company::all();
        $employee=Employee::all();
        $position = Position::all();
        $staypermit=Staypermit::all();
        return view('Admin.contact.staypermit.employee_permit.employee_permit',compact('staypermit','company','employee','position'));
    }
    public function employee_approve_store(Request $reqest)
    {
        // $this->validate($request,[
        //     'company_id'=>'required',
        //     'holder_id'=>'required',
        //     'position_id'=>'required',
        //     'stay'=>'required',
        //     'fromdate'=>'required',
        //     'todate'=>'required',
        //     'approveddate'=>'required',
        //     'canceleddate'=>'required',
        //     'mic_appointed'=>'required',
        //     'passport'=>'required',
        //     'mic_letter_number'=>'required',
        //     'submitted_time'=>'required',
        //    'resubmitted_time'=>'required'
        // ]);
        // Staypermit::create($reqest->all());
        // return redirect('employee_approve');
    }
    public function employee_approve_edit($id)
    {
        $staypermit=Staypermit::find($id);
        $company=Company::all();
        $employee=Employee::all();
        $position = Position::all();
        return view('Admin.contact.staypermit.employee_permit.edit_employee_permit',compact('staypermit','company','employee','position'));
    }
    public function employee_approve_update($id,Request $request)
    {
        $this->validate($request,[
            'mic_letter_number'=>'required'
        ]);

            
        // $fromdate=empty($request->fromdate)? '0000-00-00': $request->fromdate;
        // $todate=empty($request->todate)? '0000-00-00': $request->todate;
        // $approveddate=empty($request->approveddate)? '0000-00-00': $request->approveddate;
        // $canceleddate=empty($request->canceleddate)? '0000-00-00': $request->canceleddate;
        // $mic_appointed=empty($request->mic_appointed)? '0000-00-00': $request->mic_appointed;
        // $submitted_time=empty($request->submitted_time)? '0000-00-00': $request->submitted_time;
        // $resubmitted_time=empty($request->resubmitted_time)? '0000-00-00': $request->resubmitted_time;
        // //Staypermit::findOrFail($id)->create($request->all());
        // $staypermit=Staypermit::find($id);
        // $staypermit->fromdate=$fromdate;
        // $staypermit->todate=$todate;
        // $staypermit->canceleddate=$canceleddate;
        // $staypermit->approveddate=$approveddate;
        // $staypermit->mic_appointed=$mic_appointed;
        // $staypermit->submitted_time=$submitted_time;
        // $staypermit->resubmitted_time=$resubmitted_time;
        // $staypermit->stay=$request->stay;
        // $staypermit->mic_letter_number=$request->mic_letter_number;
        // $staypermit->save();
        // 
        Staypermit::findOrFail($id)->update($request->all());
        return redirect('employee_approve')->with('success_message','Successfully Updated Staypermits');
    }
}
