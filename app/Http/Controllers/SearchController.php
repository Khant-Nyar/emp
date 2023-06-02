<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Depend;
use App\Country;
use App\Employee;
use App\Position;
use App\Relationship;
use App\StayPermit;
//use App\Depend;
class SearchController extends Controller
{
    public function company_search(Request $request){
        $allcompanies = Company::all();
        $search_setting = ['All','Local','Foreign','Myanmar','Foreign(Associated)'];
        if($request->isMethod('post')){
            $this->validate($request, [
                'search' => 'required',
            ]);
        $search = $request->search;
        $type = $request->type;
        if($type!="All"){
            $target_company = Company::where('id',$search)->where('company_type', $type )->get();
            //return $target_company;
            //checking error 
            $company_arr = [];
            foreach($target_company as $value){
            array_push($company_arr,$value);
            }
            if(empty($company_arr)){//[]
                //return "true";
            return redirect('company_search')->with('search_setting', $search_setting)->with('error_message','No Items Found For The Search Type');}

        }else{
            $target_company = Company::where('id',$search)->get();
            //return $target_company;
        }
            //return $target_company;
            //available and useable array for Search UI
            $company_emps = [];
            $company_deps =  [];
            $company_bods = [];
            $company_resubmitted_emps = [];
            $company_resubmitted_deps = [];
            $company_resubmitted_bods = [];
            //return $target_company[0]->id;
            $allemp=Staypermit::where('company_id',$target_company[0]->id)->get();
            foreach($allemp as $oneemp){
                if($oneemp['position_id'] != 0 ){
                array_push($company_emps,$oneemp);
                    
                }
                if($oneemp['position_id'] == 0 ){
                array_push($company_deps,$oneemp);
                    
                }
                if($oneemp['position_id'] == 1 || $oneemp['position_id'] == 2){
                array_push($company_bods,$oneemp);
                    
                }      
            }
            foreach ($company_bods as $company_bod) {
               if($company_bod['status']==5){
                    array_push($company_resubmitted_bods,$company_bod);
                } 
            }
            foreach ($company_emps as $company_emp) {
               if($company_emp['status']==5){
                    array_push($company_resubmitted_emps,$company_emp);
                } 
            }
            foreach ($company_deps as $company_dep) {
               if($company_dep['status']==5){
                    array_push($company_resubmitted_deps,$company_dep);
                }  
            }
            //return $company_resubmitted_bods;
            return view('Admin.contact.search.company_search',compact('target_company','company_emps','company_deps','company_bods','company_resubmitted_emps','company_resubmitted_deps','company_resubmitted_bods','search','type','allcompanies'))->with('search_setting', $search_setting);
        }
            else if($request->isMethod('get')){
                return view('Admin.contact.search.company_search',compact('allcompanies'))->with('search_setting', $search_setting);
            }
    }


    public function employee_search()
    {
        $employee_all=Employee::all();
        return view('Admin.contact.search.employee_search',compact('employee_all'));
    }
    public function employee_view(Request $request)
    {
        $employee_search=$request->search_employee;
        $searchby=$request->searchby;
        $employee_all=Employee::all();
        $country=Country::all();
        $relationship=Relationship::all();
        $employee=Employee::all();
        $staypermit=Staypermit::all();
        $employee=Employee::where('id',$employee_search)->get();
        $employee_arr=[];
        foreach($employee as $data){
            array_push($employee_arr,$data);
        }
        //return $depend_arr;
        if(!empty($employee_arr)){
            //return $depend_arr; 
        $employee_permit=Staypermit::where('holder_id',$employee[0]['id'])->whereNotIn('position_id',[0])->get();
        $employee_position_id=Staypermit::where('holder_id',$employee[0]['id'])->whereNotIn('position_id',[0])->get();//2

        //return $employee_permit;//2
        //return $employee_position_id;
        
        if($employee_permit){
            $company_type=$request->company_type;
            if($company_type=='All'){
                $employee_company=Company::where('id',$employee_permit[0]['company_id'])->get('name');
                $employee_company=$employee_company[0]['name'];
                $employee_position=$employee_permit[0]->positions['position_name'];
                
                return view('Admin.contact.search.employee_search',compact('employee','employee_company','employee_position','company_type','employee_all'));
            }
            else{
                $employee_company_obj=Company::where('id',$employee_permit[0]['company_id'])->where('company_type',$company_type)->get('name');
                $employee_company=[];
                foreach($employee_company_obj as $data){
                    array_push($employee_company,$data);
                }
                if(empty($employee_company)){
                    $error_message="No Items Found For The Search Type";
                    return view('Admin.contact.search.employee_search',compact('employee_all','error_message'));
                }else{
                    $employee_company=$employee_company[0]['name'];
                    $employee_position=$employee_permit[0]->positions['position_name'];
                    //return $employee_company;
                    return view('Admin.contact.search.employee_search',compact('employee','employee_company','employee_position','company_type','employee_all'));  
                }
            }
 
        }
    }else{
       // return 'Invalid Dependent';
        return redirect('employee_search')->with('error_message','Invalid Dependent');
    }    
    }
    public function employee_detail($id)
    {
        $depend=Employee::find($id);
        $staypermit=Staypermit::where('holder_id',$id)->whereNotIn('position_id',0)->get();
        return view('Admin.contact.detail_search.depend_detail',compact('depend','staypermit')); 
    }



    public function country_search(Request $request){
        $countries = Country::all();
        if($request->isMethod('get')){
            return view('Admin.contact.search.country_search',compact('countries'));
        }elseif($request->isMethod('post')){
            $search = $request->search;
            $company_type = $request->company_type;
            $solocountry = Country::find($search);
            $company = Company::where('company_type',$company_type)->get();
            $related_company_id = [];
            foreach($company as $data){
                array_push($related_company_id,$data['id']);
            }
           
            $emp_permit = Staypermit::whereNotIn('position_id',[0])->get();//all emp
            $depend_permit = Staypermit::where('position_id',0)->get();//all permit
            $bod_permit = Staypermit::where('position_id',1)->orwhere('position_id',2)->get();//all bod
            $bod_country=[];
            foreach ($bod_permit as $value) {
                
                $country_id=$value->employees->countries->id;
                $data=Employee::where('country_id',$country_id)->get();
                array_push($bod_country,$data);
            }
                       
            $bods= $bod_country[0];
            //return $bod_country;
            return view('Admin.contact.search.country_search',compact('countries','search','bods','emp_permit','depend_permit'));
        }
    	
    }
    
    public function bod_search(){
        $bod_all=Employee::where('bod',1)->get();
    	return view('Admin.contact.search.bod_search',compact('bod_all'));
    }
    public function bod_view(Request $request){
        $bod_search=$request->search_bod;
        $bod_all=Employee::where('bod',1)->get();
        $bod=Employee::where('id',$bod_search)->get();
        $bod_permit=Staypermit::where('holder_id',$bod[0]['id'])->whereNotIn('position_id',[0])->get();
        //return $bod_permit;
        return view('Admin.contact.search.bod_search',compact('bod','bod_permit','bod_all'));
    }
    public function bod_detail($id){
        $employee=Employee::find($id);
        $depend=Depend::where('employee_id',$id)->get();
        $history=Staypermit::where('holder_id',$id)->whereNotIn('position_id',[0])->get();
        //return $depend;
        return view('Admin.contact.detail_search.bod_detail',compact('employee','depend','history'));
    }
    public function resigner($id){
        $target_permit = Staypermit::findOrFail($id);
        $target_permit->status = 5;
        $target_permit->save();
        return back();
    }


    //Dependent
    public function depend_search()
    {
        $depend_all=Depend::all();
        return view('Admin.contact.search.depend_search',compact('depend_all'));
    }
    public function depend_view(Request $request)
    {
        $depend_search=$request->search_depend;
        $searchby=$request->searchby;
        $depend_all=Depend::all();
        $country=Country::all();
        $relationship=Relationship::all();
        $employee=Employee::all();
        $staypermit=Staypermit::all();
        $depend=Depend::where('id',$depend_search)->get();
        $depend_arr=[];
        foreach($depend as $data){
            array_push($depend_arr,$data);
        }
        //return $depend_arr;
        if(!empty($depend_arr)){
            //return $depend_arr; 
        $depend_permit=Staypermit::where('holder_id',$depend[0]['id'])->where('position_id',0)->get('company_id');
        //return $depend_permit;
        if($depend_permit){
            $company_type=$request->company_type;
            if($company_type=='All'){
                $depend_company=Company::where('id',$depend_permit[0]['company_id'])->get('name');
                $depend_company=$depend_company[0]['name'];
                return view('Admin.contact.search.depend_search',compact('depend','depend_company','company_type','depend_all'));
            }else{
                $depend_company_obj=Company::where('id',$depend_permit[0]['company_id'])->where('company_type',$company_type)->get('name');
                $depend_company=[];
                foreach($depend_company_obj as $data){
                    array_push($depend_company,$data);
                }
                if(empty($depend_company)){
                    $error_message="No Items Found For The Search Type";
                    return view('Admin.contact.search.depend_search',compact('depend_all','error_message'));
                }else{
                    $depend_company=$depend_company[0]['name'];
                    return view('Admin.contact.search.depend_search',compact('depend','depend_company','company_type','depend_all'));  
                }
            }
 
        }
    }else{
       // return 'Invalid Dependent';
        return redirect('depend_search')->with('error_message','Invalid Dependent');
    }    
    }
    public function depend_detail($id)
    {
        $depend=Depend::find($id);
        $staypermit=Staypermit::where('holder_id',$id)->where('position_id',0)->get();
        return view('Admin.contact.detail_search.depend_detail',compact('depend','staypermit')); 
    }

    
    //From Date
    public function fromdate_search(){
        return view('Admin.contact.search.fromdate_search');
    }
    public function fromdate_view(Request $request)
    {
        $from_date=$request->fromdate;
        $to_date=$request->todate;

        
        // $users = User::select("*")
        // ->whereBetween('created_at', [$start, $end])
        // ->get();
        //$diffdate=Staypermit::where('fromdate','>=',$from_date)->where('todate','<=',$to_date)->get();
        $diffdate=Staypermit::whereBetween('fromdate',[$from_date,$to_date])->get();
        $employee_id=Staypermit::whereBetween('fromdate',[$from_date,$to_date])->get('holder_id');
        $countries_holder = [];
        foreach($employee_id as $eid){
            $emp_country = $eid['employees'];
            array_push($countries_holder,$emp_country['countries']['country_name']);
            
        }
        $country=Country::all('country_name');
        $countries_arr=[];
        $countries_data=[];
        $no=0;
        foreach($country as $gg=>$value){
            
            $countries_arr[$gg]=$value['country_name'];
            
           
        }
        //to compare $countries_arr & $countries_holder
        foreach($country as $gg=>$value){
            $country_data[$value['country_name']]=0;
            $countries_arr[$gg]=$value['country_name'];
            
        }
        foreach($countries_holder as $gg=>$value){
            foreach($countries_arr as $aa=>$data){
                //echo $value ."=".$data."<br>";
                if($value == $data){
                    $country_data[$value]+=1;
                    
                }
                
            }
        }
        $total=0;
        foreach($country_data as $i=>$value){
            $total+=$value;
        }
        return view('Admin.contact.search.fromdate_search',compact('diffdate','from_date','to_date','country_data','no','total')); 

    }

}
