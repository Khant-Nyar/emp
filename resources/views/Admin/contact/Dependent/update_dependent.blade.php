@extends('Admin.master')
@section('pageheader','Update Dependent')
@section('contact')


    <div class="container-fluid">
        <h1 class="mt-4">Update Dependent</h1>
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
                <form action="{{url('edit_dependent/'.$depend->id)}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="exampleInputEmail1">Depend Name</label>
                        <input type="text" class="form-control"  value="{{$depend->depend_name}}" name="depend_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <select name="country_id" id="" class="form-control chosen">
                             @foreach($country as $value)
                            <option value="{{$value['id']}}"
                            @if($value['id']==$depend['country_id'])
                                selected
                            @endif
                            >{{$value['country_name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                            <!-- * * * Need Eloquent * * * -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Passport</label>
                        <input type="text" class="form-control" value="{{$depend->passport}}" name="passport">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee</label>
                        <select name="employee_id" id="" class="form-control chosen">
                            @foreach($employee as $value)
                            <option value="{{$value['id']}}"
                            @if($value['id']==$depend['employee_id'])
                                selected
                            @endif
                            >{{$value['name']}}</option>
                            <!-- * * * Need Eloquent * * * -->
                            @endforeach
                            <!-- * * * Need Eloquent * * * -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Relationship</label>
                        <select name="relationship_id" id="" class="form-control chosen">
                            @foreach($relationship as $value)
                            <option value="{{$value['id']}}"
                            @if($value['id']==$depend['relationship_id'])
                                selected
                            @endif
                            >{{$value['relationship_name']}}</option>
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
    </div>

@endsection