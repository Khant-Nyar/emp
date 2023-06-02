@extends('Admin.master')
@section('pageheader','Country')
@section('contact')
    <div class="container-fluid">
        <h1 class="mt-4">Country</h1>
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
            @if($message = Session::get('error_message'))
               <div class="alert alert-sm alert-danger alert-block" role="alert">
                  <button type="button" class="close" data-dimiss="alert" aria-label="closes">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <span>{{ $message }}</span>
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
            <div class="card-body">
                <form action="{{url('/add_country')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="country_name">Add More Country</label>
                        <input type="text" class="form-control" id="country_name" aria-describedby="emailHelp" placeholder="Enter Country Name" name="country_name">
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
                Country DataTable
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tableOfCountry" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Flag</th>
                                <th>Nationality</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Flag</th>
                                <th>Nationality</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($country as $i=>$data)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @foreach($flag as $fdata)
                                    @if(strpos( strtolower($fdata->flag_name),strtolower($data->country_name)) !== false)
                                    <img src="{{asset('flags/'.$fdata['flag_image'])}}"  width="40" alt="Country Image" class="img-thumbnail">
                                    @endif 
                                    @endforeach
                                    </td>
                                <td>{{ $data['country_name'] }}</td>
                                <td><a href="{{url('/edit_country/'.$data['id'])}}" class="btn btn-outline-success">Update</a></td>
                                <td><a href="{{url('/delete_country/'.$data['id'])}}" class="btn btn-outline-danger" onclick="alert('Are You Sure Delete Current Item')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
