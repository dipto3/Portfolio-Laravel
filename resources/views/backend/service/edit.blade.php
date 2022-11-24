@extends('backend.master')
@section('main_content')
 <div class="container-fluid ">
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit</li>
            
        </ol>
        @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <h4 class="alert-heading">Success!{{ session('message') }}</h4>    

        </div>
        @endif
        

        <form action="{{url('/service/create/update'.$services->id)}}" method="post">

            @csrf
            <div class="form-group mb-3">
                <label for="">Icon</label>
                <input type="text" name="icon" class="form-control" value="{{$services->icon}}">
            </div>

            <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$services->title}}">
            </div>

            <div class="form-group mb-3">
                <label for="">Description</label>
                <textarea type="text" name="description" class="form-control" >{{$services->description}} </textarea>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
        
    </div>

@endsection