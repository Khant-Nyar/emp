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
            <div class="card-body">
                
                <form action="{{ url('/edit_position/'.$positions->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="add_Position">Edit Position</label>
                        <input type="text" name="position_name" class="form-control" id="add_Position" aria-describedby="help" value="{{ $positions->position_name }}">
                        <small id="help" class="form-text text-muted">If you need to add more Features or Any Other Problem <a href="">Contact Us</a></small>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-secondary">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($message = Session::get('success'))
                        <div class="alert alert-success mt-2">
                            {{ $message }}
                        </div>
                        @endif

                    </div>
                    <button type="submit" class="btn btn-default border border-success">Update</button>
                    <button type="reset" class="btn btn-default border border-success ml-3">Reset</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
