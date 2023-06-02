
@extends('Admin.master')
@section('pageheader','Depend Detail')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Dependent</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        
        <div class="card mb-4">
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
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-people-arrows"></i>
                Dependent Information
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
                                <th>Employee</th>
                                <th>Relationship</th>
                                
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
                                <th>Employee</th>
                                <th>Relationship</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
                        
                       
                            <tr>
                                <td>{{$depend['id']}}</td>
                                <td>{{$depend['depend_name']}}</td>
                                <td>{{$depend['countries']['country_name']}}</td>
                                <td>{{$depend['passport']}}</td>
                                <td>{{$depend['employees']['name']}}</td>
                                <td>{{$depend['relationships']['relationship_name']}}</td>
                                
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-people-arrows"></i>
                Histroy
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company</th>
                                <th>Stay Date</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approve Date</th>
                                <th>Canceled Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
                                <th>Employee</th>
                                <th>Relationship</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
                        
                        @foreach($staypermit as $i=>$value)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$value['companies']['name']}}</td>
                                <td>{{$value['stay']}} months</td>
                                <td>{{$value['fromdate']}}</td>
                                <td>{{$value['todate']}}</td>
                                <td>{{$value['approveddate']}}</td>
                                <td>{{$value['canceleddate']}}</td>
                                
                                @if($value['status']==1)
                                    <td>Working</td>
                                @else
                                    <td>Retired</td>
                                @endif
                                
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection