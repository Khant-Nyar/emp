@extends('Admin.master')
@section('pageheader','Country')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4"> Update Country</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            @if($message = Session::get('error_message'))
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
            <div class="card-body">
                <form action="{{url('/update_country/'.$edit_country['id'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="country_name">Edit Country</label>
                        <input type="text" class="form-control" id="country_name" aria-describedby="emailHelp" placeholder="Enter Country Name" name="country_name" value="{{$edit_country['country_name']}}">
                        <small id="emailHelp" class="form-text text-muted">If you need to add more Flags or Any Other Problem <a href="">Contact Us</a></small>
                    </div>
                    <button type="submit" class="btn btn-default border border-success">Submit</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
