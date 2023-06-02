@extends('Admin.master')
@section('pageheader','Employee')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Employee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">

            <div class="card-body">
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
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
                <form action="{{url('add_employee')}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text"  class="form-control"  name="name">
                    </div>
                    <div class="form-group">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control chosen">
                            @foreach($country as $data)
                            <option value="{{$data->id}}">{{$data['country_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                            
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>   
                        <select name="company_id" id="company_id" class="form-control chosen">
                        @foreach($company as $data)
                            <option value="{{$data->id}}">{{$data['name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position_id">Position</label>   
                        <select name="position_id" id="position_id" class="form-control chosen">
                        @foreach($position as $data)
                            <option value="{{$data->id}}">{{$data['position_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Passport</label>
                        <input type="text"   class="form-control" name="passport">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BOD</label>   
                        <select name="bod" id="" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="reset" class="btn btn-outline-success  ml-3">Reset</button>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Employee DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Passport</th>
                                <th>BOD</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>No</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Passport</th>
                                
                                <th>BOD</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        @foreach($employee as $i=>$value)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['countries']['country_name']}}</td>
                                <td>{{$value['passport']}}</td>
                                
                                
                                @if($value->bod==1)
                                <td>Yes</td>
                                @else
                                <td>No</td>
                                @endif
                                
                                <td><a href="{{url('edit_employee/'.$value['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('delete_employee/'.$value['id'])}}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
