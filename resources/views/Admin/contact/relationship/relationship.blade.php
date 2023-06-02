@extends('Admin.master')
@section('pageheader','Relationship')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Relationship</h1>
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
               @if($message = Session::get('error_message'))
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
               </div>
               @endif
            <div class="card-body">
                <form action="{{url('/add_relationship')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="relationship_name">Add More Relationship</label>
                        <input type="text" class="form-control" id="relationship_name" aria-describedby="emailHelp" placeholder="Enter Relationship Name" name="relationship_name">
                        <small id="emailHelp" class="form-text text-muted">If you need to add more Flags or Any Other Problem <a href="">Contact Us</a></small>
                    </div>
                    <button type="submit" class="btn btn-default border border-success">Submit</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Relationship DataTable 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Relationship Name</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Relationship Name</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($relationship as $i=>$data)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $data['relationship_name'] }}</td>
                                <td><a href="{{url('edit_relationship/'.$data['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('delete_relationship/'.$data['id'])}}" class="btn btn-outline-danger" onclick="alert('Are You Sure Delete Current Item')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
