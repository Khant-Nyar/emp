
@extends('Admin.master')
@section('pageheader','Search Company')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card">
            @if($message = Session::get('error_message'))
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
        	<div class="card-header">
                <i class="fas fa-building"></i>
                Company Search Form 
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-secondary">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        	<div class="card-body">
                <form action="{{url('company_search')}}" method="post">
                @csrf
                <div class="row">
                        <div class="form-group col-md-4">
                            <select name="search" id="search" class="form-control chosen" >
                                @foreach($allcompanies as $data)
                                <option value="{{$data->id}}"
                                    @isset($search)
                                    @if($search==$data->id)
                                    selected
                                    @endif
                                    @endisset
                                    >{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control" name="type" id="type">
                                @isset($search_setting)
                                     @foreach($search_setting as $i=>$ss)
                                    <option value="{{$ss}}"
                                        @isset($type)
                                        @if($type == $ss)
                                            selected
                                        @endif
                                        @endisset
                                    >{{$ss}}</option>
                                @endforeach 
                                @endisset
                            </select>
                        </div>
                </div>
                    <button type="submit" class="btn btn-default border border-success">Search</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form> 
            </div>
        </div>
        
        <div class="card mb-4">
            {{-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-secondary">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                {{-- @if($message = Session::get('success_message'))
               <div class="alert alert-sm alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif --}}
        </div>
 @isset($target_company)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Company List 
                @php
                $count = sizeof($target_company);
                @endphp
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company Id</th>
                                <th>Company Name</th>
                                <th>Mic Permit Number</th>
                                <th>Expired Date</th>
                                <th>Address</th>
                                <th>Proposal Foreign</th>
                                <th>Proposal Local</th>
                                <th>Additional</th>
                                <th>Approved Foreign</th>
                                <th>Appointed Local</th>
                                <th>CRN</th>
                                <th>Co Type</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Company Id</th>
                                <th>Company Name</th>
                                <th>Mic Permit Number</th>
                                <th>Expired Date</th>
                                <th>Address</th>
                                <th>Proposal Foreign</th>
                                <th>Proposal Local</th>
                                <th>Additional</th>
                                <th>Approved Foreign</th>
                                <th>Appointed Local</th>
                                <th>CRN</th>
                                <th>Co Type</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($target_company as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data['id']}}</td>
                                <td>{{$data['name']}}</td>
                                <td>{{$data['mic']}}</td>
                                <td>{{$data['expireddate']}}</td>
                                <td>{{$data['address']}}</td>
                                <td>{{$data['proposel']}}</td>
                                <td>{{$data['proposel_local']}}</td>
                                <td>{{$data['additional']}}</td>
                                <td>{{$data['approved']}}</td>
                                <td>{{$data['approved_local']}}</td>
                                <td>{{$data['crn']}}</td>
                                <td>{{$data['company_type']}}</td>
                                <td><a href="{{'edit_company/'.$data->id}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{'delete_company/'.$data->id}}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        @isset($company_bods)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                BOD List 
                @php $count = 0; @endphp                 
                @foreach($company_bods as $data)
                    @isset($data['status'])
                        @if($data['status'] != 5)
                            @php  $count++; @endphp
                        @endif
                    @endisset
                @endforeach
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_bods as $i=>$data)
                            @if($data['status'] != 5)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>@php
                                $emp_country = $data['employees'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']!=0)
                                {{$data['employees']['name']}}
                                @endif
                                </td>
                                <td>{{$data['positions']['position_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                                <td><a href="{{'permit_resign/'.$data->id}}" class="btn btn-outline-warning">Resign</a></td>
                                <td><a href="{{'edit_employee_approve/'.$data->id}}" class="btn btn-outline-info">Extend</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        @isset($company_emps)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Employee List 
                @php $count = 0; @endphp                 
                @foreach($company_emps as $data)
                    @isset($data['status'])
                        @if($data['status'] != 5)
                            @php  ++$count; @endphp
                        @endif
                    @endisset
                @endforeach
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </thead>
                       {{--  <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_emps as $i=>$data)
                            @if($data['status'] != 5)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>@php
                                $emp_country = $data['employees'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']!=0)
                                {{$data['employees']['name']}}
                                @endif
                                </td>
                                <td>{{$data['positions']['position_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                                <td><a href="{{'permit_resign/'.$data->id}}" class="btn btn-outline-warning">Resign</a></td>
                                <td><a href="{{'edit_employee_approve/'.$data->id}}" class="btn btn-outline-info">Extend</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        @isset($company_deps)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Dependent List 
                @php $count = 0; @endphp                 
                @foreach($company_deps as $data)
                    @isset($data['status'])
                        @if($data['status'] != 5)
                            @php  ++$count; @endphp
                        @endif
                    @endisset
                @endforeach
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Dependent Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>Relationship</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Dependent Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>Relationship</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_deps as $i=>$data)
                            @if($data['status'] != 5)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>
                                    @php
                                $emp_country = $data['depends'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']==0)
                                {{$data['depends']['depend_name']}}
                                @endif
                                </td>
                                <td>
                                    @php
                                $depend = $data['depends'];
                                    @endphp
                               {{$depend['employees']['name']}}
                                </td>
                                <td>{{$data['position_id']}}</td>
                                <td>{{$depend['relationships']['relationship_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                                <td><a href="{{'permit_resign/'.$data->id}}" class="btn btn-outline-warning">Resign</a></td>
                                <td><a href="{{'edit_employee_approve/'.$data->id}}" class="btn btn-outline-info">Extend</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        

        
        
        @isset($company_resubmitted_bods)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Resigned BOD List
                @php
                $count = sizeof($company_resubmitted_bods);
                @endphp
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_resubmitted_bods as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>@php
                                $emp_country = $data['employees'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']!=0)
                                {{$data['employees']['name']}}
                                @endif
                                </td>
                                <td>{{$data['positions']['position_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        @isset($company_resubmitted_emps)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Resigned Employee List
                @php
                $count = sizeof($company_resubmitted_emps);
                @endphp
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_resubmitted_emps as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>@php
                                $emp_country = $data['employees'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']!=0)
                                {{$data['employees']['name']}}
                                @endif
                                </td>
                                <td>{{$data['positions']['position_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
        @isset($company_resubmitted_deps)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-building"></i>
                Resigned Dependent List
                @php
                $count = sizeof($company_resubmitted_deps);
                @endphp
                {{"( ".$count." )"}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Dependent Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>Relationship</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>Dependent Name</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>Relationship</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                                <th>Extend</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($company_resubmitted_deps as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>@php
                                $emp_country = $data['employees'];
                                    @endphp
                               {{$emp_country['countries']['country_name']}}
                                </td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>
                                @if($data['position_id']==0)
                                {{$data['depends']['depend_name']}}
                                @endif
                                </td>
                                <td>
                                    @php
                                $depend = $data['depends'];
                                    @endphp
                               {{$depend['employees']['name']}}
                                </td>
                                <td>{{$data['position_id']}}</td>
                                <td>{{$depend['relationships']['relationship_name']}}</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approved_date']}}</td>
                                <td>{{$data['status']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
    </div>
@endsection