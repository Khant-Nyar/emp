
@extends('Admin.master')
@section('pageheader','Search Date')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Fromdate</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card">
        	<div class="card-header">
                <i class="fas fa-calendar-alt"></i>
                Fromdate Search Form 
            </div>
        	<div class="card-body">
    		<form action="" method="post">
    		@csrf
    		<div class="row">
            		<div class="form-group col-md-3">
                    <label for="searchBy">From Date</label>
                        <input type="date" class="form-control" name="fromdate">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="searchBy">To Date</label>
                        <input type="date" class="form-control" name="todate">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="searchBy">SearchBy</label>
                        <select class="form-control" id="searchBy" name="searchby">
                        	<option value="">All</option>
                        	<option value="">MIC</option>
                        	<option value="">DICA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="type">Type</label>
                        <select class="form-control" id="type" name="company_type">
                        
                        	<option value="All">All</option>
                        	<option value="Foreign">Foreign</option>
                        	<option value="Foreign(Branch)">Foreign(Branch)</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Associate">Associate</option>
                        </select>
                    </div>
                
            </div>
                <button type="submit" class="btn btn-default border border-success">Search</button>
                <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
            </form>	
        </div>
        </div>
        
        <div class="card mb-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-secondary">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if($message = Session::get('success_message'))
               <div class="alert alert-sm alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
        </div>
        @isset($diffdate)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-calendar-alt"></i>
                Fromdate {{$from_date}} to {{$to_date}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                       
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Passport No.</th>
                                <th>Company</th>
                                <th>Nationality</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>No</th>
                                <th>Name</th>
                                <th>Passport No.</th>
                                <th>Company</th>
                                <th>Nationality</th>
                                <th>Approved Date</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        @foreach($diffdate as $i=>$value)
                            <tr>
                                <td>{{$value['id']}}</td>
                            	<td>{{$value['employees']['name']}}</td>
                            	<td>{{$value['employees']['passport']}}</td>
                            	<td>{{$value['companies']['name']}}</td>
                            	<td>{{$value['employees']['countries']['country_name']}}</td>
                                <td>@if ($value['approveddate']==NULL)
                                    00-00-00
                                @else
                                    {{$value['approveddate']}}
                                @endif
                                </td>
                                <td>{{$value['status']}}</td>
                                <td><a href="{{url('edit_dependent/'.$value['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('delete_dependent/'.$value['id'])}}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset



        @isset($diffdate)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-calendar-alt"></i>
                Fromdate {{$from_date}} to {{$to_date}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="ggtable" width="100%" cellspacing="0">
                        <thead>
                       
                            <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Number Of People</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                        @foreach($country_data as $i=>$value)
                            <tr>
                               
                               @if($value > 0)
                               <td>{{++$no}}</td>
                               <td>{{$i}}</td>
                               <td>{{$value}}</td>
                               @endif
                            </tr>
                        @endforeach
                        
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th>{{$total}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
    </div>
@endsection