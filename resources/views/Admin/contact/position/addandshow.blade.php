@extends('Admin.master')
@section('pageheader','Position')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">@yield('pageheader')</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">@yield('pageheader')</li>
        </ol>
        <div class="card mb-4">
            @if($message = Session::get('success'))
               <div class="alert alert-sm alert-danger alert-block" role="alert">
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
               @if (count($errors) > 0)
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-secondary">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
            <div class="card-body">
                <form action="{{ url('/add_position') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="add_Position">Add Position</label>
                        <input type="text" name="position_name" class="form-control" id="add_Position" aria-describedby="help" placeholder="Enter Position Name">
                        <small id="help" class="form-text text-muted">If you need to add more Features or Any Other Problem <a href="">Contact Us</a></small>
                    </div>
                    <button type="submit" class="btn btn-default border border-success">Submit</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>

                </form>
                
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
               List Of Position
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Of Position</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name Of Position</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($positions as $i=>$position)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $position->position_name }}</td>
                                <td><a href="{{ url('/edit_position/'.$position->id) }}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{ url('/delete_position/'.$position->id) }}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
