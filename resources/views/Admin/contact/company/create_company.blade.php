@extends('Admin.master')
@section('pageheader','Company')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Forms</li>
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
                <form action="{{url('/add_company')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="bod">Company BOD</label>
                        <input type="number" class="form-control" id="bod" placeholder="Enter Company BOD" name="bod">
                    </div>
                    <div class="form-group">
                        <label for="mic">Company MIC</label>
                        <input type="text" class="form-control" id="mic" placeholder="Enter Company MIC" name="mic">
                    </div>
                    <div class="form-group">
                        <label for="expireddate">Company Expired Date</label>
                        <input type="date" class="form-control" id="expireddate" placeholder="Enter Company Expired Date" name="expireddate">
                    </div>
                    <div class="form-group">
                        <label for="address">Company Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Company Address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="proposel">Company Proposel</label>
                        <input type="number" class="form-control" id="proposel" placeholder="Enter Company Proposel" name="proposel">
                    </div>
                    <div class="form-group">
                        <label for="proposel_local">Company Proposel Local</label>
                        <input type="number" class="form-control" id="proposel_local" placeholder="Enter Company Proposel Local" name="proposel_local">
                    </div>
                    <div class="form-group">
                        <label for="additional">Company Addition</label>
                        <input type="number" class="form-control" id="al" placeholder="Enter Company Addition" name="additional">
                    </div>
                    <div class="form-group">
                        <label for="approved">Company Approved</label>
                        <input type="number" class="form-control" id="approved" placeholder="Enter Company Approved" name="approved">
                    </div>
                    <div class="form-group">
                        <label for="approved_local">Company Approved Local</label>
                        <input type="number" class="form-control" id="approved_local" placeholder="Enter Company Approved Local" name="approved_local">
                    </div>
                    <div class="form-group">
                        <label for="crn">Company CRN</label>
                        <input type="text" class="form-control" id="crn" placeholder="Enter Company CRN" name="crn">
                    </div>
                    <div class="form-group">
                        <label for="company_type">Company Type</label>
                        <input type="text" class="form-control" id="company_type" placeholder="Enter Company Type" name="company_type">
                    </div>
                    <button type="submit" class="btn btn-default border border-success">Submit</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
