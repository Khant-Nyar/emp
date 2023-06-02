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
                <form action="{{url('/edit_user/'.$user->id)}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control"  name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Eamil</label>
                        <input type="email" class="form-control"  name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" value="{{$user->password}}">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select name="role" id="" class="form-control">
                            @foreach($role as $value)
                            <option value="{{$value['id']}}"
                            @if($user->role == $value->id)
                            selected
                            @endif
                            >{{$value['role_name']}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="reset" class="btn btn-outline-success  ml-3">Reset</button>
                </form>
            </div>
        </div>
        </div>
@endsection