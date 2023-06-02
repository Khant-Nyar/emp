@extends('Admin.master')
@section('pageheader','Dependent')
@section('contact')


    <div class="container-fluid">
        <h1 class="mt-4"> Dependent</h1>
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
                <form action="{{url('add_dependent')}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="exampleInputEmail1">Depend Name</label>
                        <input type="text"   class="form-control"  name="depend_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <select name="country_id" id="" class="form-control chosen">
                            @foreach($country as $value)
                            <option value="{{$value['id']}}">{{$value['country_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Passport</label>
                        <input type="text"  class="form-control" name="passport">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee</label>
                        <select name="employee_id" id="" class="form-control chosen">
                            @foreach($employee as $value)
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                            <!-- * * * Need Eloquent * * * -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Relationship</label> 
                        <select name="relationship_id" id="" class="form-control chosen">
                            @foreach($relationship as $value)
                            <option value="{{$value['id']}}">{{$value['relationship_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                            <!-- * * * Need Eloquent * * * -->
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
                Dependent DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                       
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
                                <th>Employee</th>
                                <th>Relationship</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
                                <th>Employee</th>
                                <th>Relationship</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        @foreach($depend as $i=>$value)
                            <tr>
                            <!-- need eloquent -->
                                <td>{{++$i}}</td>
                                <td>{{$value['depend_name']}}</td>
                                <td>{{$value['countries']['country_name']}}</td>
                                <td>{{$value['passport']}}</td>
                                <td>{{$value['employees']['name']}}</td>
                                <td>{{$value['relationships']['relationship_name']}}</td>
                                <td><a href="{{url('edit_dependent/'.$value['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('delete_dependent/'.$value['id'])}}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection