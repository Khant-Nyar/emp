@extends('Admin.master')
@section('pageheader','Stay Permit')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Stay Permits</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        {{-- <div class="card mb-4">

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
                <form action="{{url('add_employee_approve')}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="name">Company Name</label>
                        <select name="company_id" class="form-control">\
                            @foreach($company as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option> 
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="name">Holder</label>
                        <select name="holder_id" class="form-control">
                            @foreach($employee as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option> 
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="name">Position</label>
                        <select name="position_id" class="form-control">
                            @foreach($position as $value)
                                <option value="{{$value['id']}}">{{$value['position_name']}}</option> 
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="name">Stay</label>
                        <select name="stay" class="form-control">
                            <option value="1">1</option> 
                        </select>
                </div>
                <div class="form-group">
                        <label for="name">From Date</label>
                        <input type="date" name="fromdate" class="form-control">
                </div>    
                <div class="form-group">
                        <label for="name">To Date</label>
                        <input type="date" name="todate" class="form-control">
                </div>
                <div class="form-group">
                        <label for="name">Approved Date</label>
                        <input type="date" name="approveddate" class="form-control">
                </div>    
                <div class="form-group">
                        <label for="name">Cancel Date</label>
                        <input type="date" name="canceleddate" class="form-control">
                </div>
                <div class="form-group">
                        <label for="name">MIC Appointed</label>
                        <input type="date" name="mic_appointed" class="form-control">
                </div>
                <div class="form-group">
                        <label for="name">MIC Letter Number</label>
                        <input type="text" name="mic_letter_number" class="form-control">
                </div>
                <div class="form-group">
                        <label for="name">Submitted Time</label>
                        <input type="date" name="submitted_time" class="form-control">
                </div>
                <div class="form-group">
                        <label for="name">Resubmitted Time</label>
                        <input type="date" name="resubmitted_time" class="form-control">
                </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="reset" class="btn btn-outline-success  ml-3">Reset</button>
                </form>
            </div>
        </div> --}}
        <div class="card mb-4">
            <div class="card-header">
                @if($message = Session::get('success_message'))
               <div class="alert alert-sm alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
                <i class="fas fa-table mr-1"></i>
                Employee Approve DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company Name</th>
                                <th>Holder</th>
                                <th>Position</th>
                                <th>Stay</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Cancel Date</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>MIC Appointed</th>
                                <th>MIC Letter Number</th>
                                <th>Submitted Time</th>
                                <th>Resubmitted Time</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Company Name</th>
                                <th>Holder</th>
                                <th>Position</th>
                                <th>Stay</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approved Date</th>
                                <th>Cancel Date</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>MIC Appointed</th>
                                <th>MIC Letter Number</th>
                                <th>Submitted Time</th>
                                <th>Resubmitted Time</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                       
                        @foreach($staypermit as $i=>$value)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$value['companies']['name']}}</td>
                                <td>
                                    @if($value['position_id']==0)
                                    {{$value['depends']['depend_name']}}
                                @else
                                    {{$value['employees']['name']}}
                                @endif
                                </td>
                                
                                <td>@if($value['position_id']==0)
                                    Depend
                                @else
                                    {{$value['positions']['position_name']}}
                                @endif
                                </td>
                                <td>{{$value['stay']}}</td>
                                <td>@if ($value['fromdate']==NULL)
                                    00-00-00
                                @else
                                    {{$value['fromdate']}}
                                @endif
                                </td>

                                <td>@if ($value['todate']==NULL)
                                    00-00-00
                                @else
                                    {{$value['todate']}}
                                @endif
                                </td>
                                <td>@if ($value['approveddate']==NULL)
                                    00-00-00
                                @else
                                    {{$value['approveddate']}}
                                @endif
                                </td>
                                <td>@if ($value['canceleddate']==NULL)
                                    00-00-00
                                @else
                                    {{$value['canceleddate']}}
                                @endif
                                </td>
                                
                                <td>{{$value['type']}}</td>
                                <td>{{$value['status']}}</td>
                                
                                <td>@if ($value['mic_appointed']==NULL)
                                    00-00-00
                                @else
                                    {{$value['mic_appointed']}}
                                @endif
                                </td>
                                <td>{{$value['mic_letter_number']}}</td>
                                
                                <td>@if ($value['submitted_time']==NULL)
                                    00-00-00
                                @else
                                    {{$value['submitted_time']}}
                                @endif
                                </td>
                                <td>@if ($value['resubmitted_time']==NULL)
                                    00-00-00
                                @else
                                    {{$value['resubmitted_time']}}
                                @endif
                                </td>
                                <td><a href="{{url('edit_employee_approve/'.$value['id'])}}" class="btn btn-outline-success">Update</a></td>
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