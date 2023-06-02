@extends('Admin.master')
@section('pageheader','Employee')
@section('contact')
<div class="container-fluid">
        <h1 class="mt-4">Update Employee</h1>
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
                <form action="{{url('/edit_employee/'.$employee->id)}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <input type="text" class="form-control" value="{{$employee['name']}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <select name="country_id" id="" class="form-control chosen">
                            @foreach($country as $data)
                            <option value="{{$data->id}}"
                                @if($data['id']==$employee['country_id'])
                                selected
                                @endif
                                >{{$data['country_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Passport</label>
                        <input type="text" class="form-control" value="{{$employee['passport']}}" name="passport">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BOD</label>
                        <!-- <input type="text" class="form-control"value="{{$employee['bod']}}" name="bod"> -->
                        <select name="bod" id="" class="form-control">
                        <option value="1" @if($employee->bod==1) selected @endif>Yes</option>
                        <option value="0" @if($employee->bod==0) selected @endif>No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="reset" class="btn btn-outline-success  ml-3">Reset</button>
                </form>
            </div>
        </div>
</div>
@endsection