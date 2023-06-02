@extends('Admin.master')
@section('pageheader','Country')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
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
                <form action="{{url('add_user')}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  class="form-control"  name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Eamil</label>
                        <input type="email"  class="form-control"  name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text"  class="form-control" name="password">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select name="role" id="" class="form-control">
                            @foreach($role as $value)
                            <option value="{{$value['id']}}">{{$value['role_name']}}</option>
                            @endforeach    
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
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        @foreach($user as $i=>$value)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['email']}}</td>
                                <td>{{$value['password']}}</td>
                                <td>{{$value['roles']['role_name']}}</td>
                                <td><a href="{{url('edit_user/'.$value['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('delete_user/'.$value['id'])}}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
