@extends('Admin.master')
@section('pageheader','Company')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            @if($message = Session::get('success_message'))
               <div class="alert alert-sm alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Company DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>BOD</th>
                                <th>MIC</th>
                                <th>Expired Date</th>
                                <th>Address</th>
                                <th>Proposel</th>
                                <th>Proposel Local</th>
                                <th>Additional</th>
                                <th>Approved</th>
                                <th>Approved Local</th>
                                <th>CRN</th>
                                <th>Company Type</th>
                                {{-- <th>Company Delete</th> --}}
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>BOD</th>
                                <th>MIC</th>
                                <th>Expired Date</th>
                                <th>Address</th>
                                <th>Proposel</th>
                                <th>Proposel Local</th>
                                <th>Additional</th>
                                <th>Approved</th>
                                <th>Approved Local</th>
                                <th>CRN</th>
                                <th>Company Type</th>
                                {{-- <th>Company Delete</th> --}}
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($company as $i=>$data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data['name']}}</td>
                                <td>{{$data['bod']}}</td>
                                <td>{{$data['mic']}}</td>
                                <td>{{$data['expireddate']}}</td>
                                <td>{{$data['address']}}</td>
                                <td>{{$data['proposel']}}</td>
                                <td>{{$data['proposel_local']}}</td>
                                <td>{{$data['additional']}}</td>
                                <td>{{$data['approved']}}</td>
                                <td>{{$data['approved_local']}}</td>
                                <td>{{$data['crn']}}</td>
                                <td>{{$data['company_type']}}</td>
                                {{-- <td>{{$data['company_delete']}}</td> --}}
                                <td><a href="{{url('/edit_company/'.$data['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('/delete_company/'.$data['id'])}}" class="btn btn-outline-danger" onclick="alert('Are You Sure Delete Current Item')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
