
@extends('Admin.master')
@section('pageheader','Search Employee')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Employee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card">
            @isset($error_message)
               
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $error_message }}</span>
               </div>
               
               @endisset
            <div class="card-header">
                <i class="fas fa-people-arrows"></i>
                Depend Search Form 
            </div>
            <div class="card-body">
            <form action="employee_search" method="post">
            @csrf
            <div class="row">
                    <div class="form-group col-md-4">
                        <label for="depend_name">Dependent Name</label>
                        <select class="form-control chosen" name="search_employee">
                            @isset($employee_all)
                            @foreach($employee_all as $data)
                                <option value="{{$data['id']}}">{{$data['name']}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="searchBy">SearchBy</label>
                        <select class="form-control" id="searchBy" name="searchby">
                            <option value="">All</option>
                            <option value="">MIC</option>
                            <option value="">DICA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="type">Type</label>
                        <select class="form-control" id="type" name="company_type">
                        
                            <option value="All">All</option>
                            <option value="Foreign">Foreign</option>
                            
                            <option value="Myanmar">Myanmar</option>
                            <option value="Associate">Foreign (Associate)</option>
                        </select>
                    </div>
                
            </div>
                <button type="submit" class="btn btn-default border border-success">View</button>
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

        @isset($company_type)
        <div class="alert alert-sm alert-success alert-block" role="alert">
                  
                  <span><b>Employee Name = {{$employee[0]['name']}}</span> |</b>
                  <span><b>Type Of Company = {{$company_type}}</span></b>

               </div>
            
            
        @endisset
        @isset($employee)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-people-arrows"></i>
                Depend Search Result 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Country</th>
                                <th>Passport</th>
                                <th>Position</th>
                                <th>Company Name</th>
                                
                                <th>View Detail</th>
                                <th>Update</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Country</th>
                                <th>Passport</th>
                                <th>Position</th>
                                <th>Company Name</th>
                                
                                <th>View Detail</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        @foreach($employee as $i=>$value)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$value['id']}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['countries']['country_name']}}</td>
                                <td>{{$value['passport']}}</td>
                                <td>{{$employee_position}}</td>
                                <td>{{$employee_company}}</td>
                                <td><a href="{{url('depend_detail/'.$value['id'])}}" class="btn btn-outline-primary">View Detail</a></td>
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
    </div>
@endsection