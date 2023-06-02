
@extends('Admin.master')
@section('pageheader','Search Country')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Country</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card">
        	<div class="card-header">
                <i class="fas fa-globe-asia"></i>
                Country Search Form 
            </div>
        	<div class="card-body">
    		<form action="{{url('country_search')}}" method="post">
    		    @csrf
        		<div class="row">
            		<div class="form-group col-md-4">
                        <select name="search" id="search" class="form-control chosen">
                            @foreach($countries as $data)
                            <option value="{{$data->id}}"
                            @isset($search)
                                @if($search == $data->id)
                                selected
                                @endif
                            @endisset
                            >{{$data->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control">
                        	<option value="">100</option>
                        	<option value="">200</option>
                        	<option value="">300</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control" id="type" name="company_type">
                            <option value="All" @isset($company_type)
                                @if($company_type == "All")
                                selected
                                @endif
                            @endisset>All</option>
                            <option value="Foreign"
                            @isset($company_type)
                                @if($company_type == "Foreign")
                                selected
                                @endif
                            @endisset>Foreign</option>     
                            <option value="Myanmar"
                            @isset($company_type)
                                @if($company_type == "Myanmar")
                                selected
                                @endif
                            @endisset>Myanmar</option>
                            <option value="Associate"
                            @isset($company_type)
                                @if($company_type == "Associate")
                                selected
                                @endif
                            @endisset>Foreign (Associate)</option>
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
               @if($message = Session::get('error_message'))
               <div class="alert alert-sm alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
        </div>

        @isset($solocountry)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-globe-asia"></i>
                Country
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country Id</th>
                                <th>Nationality</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{1}}</td>
                                <td>{{$solocountry->id}}</td>
                                <td>{{$solocountry->country_name}}</td>
                                <td><a href="">Update</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @endisset
        @isset($bods)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-globe-asia"></i>
                BOD
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country Id</th>
                                <th>Nationality</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bods as $i=>$data)
                            <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data['countries']['id']}}</td>
                            <td>{{$data['countries']['country_name']}}</td>
                            <td>{{$data['name']}}</td>
                            <td>{{$data['staypermits']['positions']['position_name']}}</td>
                            <td>@if ($data['staypermits']['fromdate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['staypermits']['fromdate']}}
                                @endif
                                </td>

                                <td>@if ($data['staypermits']['todate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['staypermits']['todate']}}
                                @endif
                                </td>
                            <td>{{$data['staypermits']['status']}}</td>
                            <td><a href="{{url('permit_resign/'.$data['id'])}}">Resign</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset


        @isset($emp_permit)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-globe-asia"></i>
                Employee
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country Id</th>
                                <th>Nationality</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($emp_permit as $i=>$data)
                            <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data['employees']['countries']['id']}}</td>
                            <td>{{$data['employees']['countries']['country_name']}}</td>
                            <td>{{$data['employees']['name']}}</td>
                            <td>{{$data['positions']['position_name']}}</td>
                            <td>@if ($data['fromdate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['fromdate']}}
                                @endif
                                </td>

                                <td>@if ($data['todate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['todate']}}
                                @endif
                                </td>
                            <td>{{$data['status']}}</td>
                            <td><a href="{{url('permit_resign/'.$data['id'])}}">Resign</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset

        @isset($depend_permit)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-globe-asia"></i>
                Dependent
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country Id</th>
                                <th>Nationality</th>
                                <th>Dependent Name</th>
                                <th>Relationship</th>
                                <th>Employee</th>
                                <th>Company</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Status</th>
                                <th>Resign</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($depend_permit as $i=>$data)
                            <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data['depends']['countries']['id']}}</td>
                            <td>{{$data['depends']['countries']['country_name']}}</td>
                            <td>{{$data['depends']['depend_name']}}</td>
                            <td>{{$data['depends']['relationships']['relationship_name']}}</td>
                            <td>{{$data['depends']['employees']['name']}}</td>
                            <td>{{$data['companies']['name']}}</td>
                            <td>@if ($data['fromdate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['fromdate']}}
                                @endif
                                </td>

                                <td>@if ($data['todate']==NULL)
                                    00-00-00
                                @else
                                    {{$data['todate']}}
                                @endif
                                </td>
                            <td>{{$data['status']}}</td>
                            <td><a href="{{url('permit_resign/'.$data['id'])}}">Resign</a></td>
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