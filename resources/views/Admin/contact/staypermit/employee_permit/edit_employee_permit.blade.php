@extends('Admin.master')
@section('pageheader','Stay Permit')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Edit Employee Approved</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
    </div>
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
                <form action="{{url('edit_employee_approve/'.$staypermit->id)}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="name">Stay</label>
                        <select name="stay" class="form-control">
                            <option value="3" @if($staypermit->stay==3) selected @endif>3 Months</option>
                            <option value="6" @if($staypermit->stay==6) selected @endif>6 Months</option>
                            <option value="12" @if($staypermit->stay==12) selected @endif>12 Months</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="name">From Date</label>
                        <input type="date" name="fromdate" class="form-control" value="{{$staypermit->fromdate}}">
                </div>    
                <div class="form-group">
                        <label for="name">To Date</label>
                        <input type="date" name="todate" class="form-control" value="{{$staypermit->todate}}">
                </div>
                <div class="form-group">
                        <label for="name">Approved Date</label>
                        <input type="date" name="approveddate" class="form-control" value="{{$staypermit->approveddate}}">
                </div>    
                <div class="form-group">
                        <label for="name">Cancel Date</label>
                        <input type="date" name="canceleddate" class="form-control" value="{{$staypermit->canceleddate}}">
                </div>
                <div class="form-group">
                        <label for="name">MIC Appointed</label>
                        <input type="date" name="mic_appointed" class="form-control" value="{{$staypermit->mic_appointed}}">
                </div>
                <div class="form-group">
                        <label for="name">MIC Letter Number</label>
                        <input type="number" name="mic_letter_number" class="form-control" value={{$staypermit->mic_letter_number}}>
                </div>
                <div class="form-group">
                        <label for="name">Submitted Time</label>
                        <input type="date" name="submitted_time" class="form-control" value="submitted_time">
                </div>
                <div class="form-group">
                        <label for="name">Resubmitted Time</label>
                        <input type="date" name="resubmitted_time" class="form-control" value="resubmitted_time">
                </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="reset" class="btn btn-outline-success  ml-3">Reset</button>
                </form>
            </div>
        </div>
@endsection