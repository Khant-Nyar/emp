
@extends('Admin.master')
@section('pageheader','BOD Detail')
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
                BOD Information
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
                                <td>{{$employee['id']}}</td>
                                <td>{{$employee['name']}}</td>
                                <td>{{$employee['countries']['country_name']}}</td>
                                <td>{{$employee['passport']}}</td>
                                
                                
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @isset($depend);
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-people-arrows"></i>
                Employee's Dependent
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Passport</th>
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
                            @foreach($depend as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data['depend_name']}}</td>
                                <td>{{$data['countries']['country_name']}}</td>
                                <td>{{$data['passport']}}</td>
                                <td>{{$data['relationships']['relationship_name']}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endisset
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
                                <th>Position</th>
                                <th>Stay Date</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Approve Date</th>
                                <th>Canceled Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($history as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data['companies']['name']}}</td>
                                <td>{{$data['positions']['position_name']}}</td>
                                <td>{{$data['stay']}} months</td>
                                <td>{{$data['fromdate']}}</td>
                                <td>{{$data['todate']}}</td>
                                <td>{{$data['approveddate']}}</td>
                                <td>{{$data['canceleddate']}}</td>
                                <td>{{$data['status']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection