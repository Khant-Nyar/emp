@extends('Admin.master')
@section('pageheader','Country')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Update Relationship</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('/update_relationship/'.$edit_relationship['id'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="relationship_name">Edit Relationship</label>
                        <input type="text" class="form-control" id="relationship_name" aria-describedby="emailHelp" placeholder="Enter Country Name" name="relationship_name" value="{{$edit_relationship['relationship_name']}}">
                        <small id="emailHelp" class="form-text text-muted">If you need to add more Flags or Any Other Problem <a href="">Contact Us</a></small>
                    </div>
                    <button type="submit" class="btn btn-default border border-success">Submit</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
