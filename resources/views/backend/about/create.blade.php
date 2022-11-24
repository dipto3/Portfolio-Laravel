@extends('backend.master')
@section('main_content')

<main>
    <div class="container-fluid ">
        <h1 class="mt-4">About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">create</li>
            
        </ol>
        @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <h4 class="alert-heading">Success!{{ session('message') }}</h4>    

        </div>
            @endif
        

        <form action="{{url('/about/create/store')}}" method="POST" enctype="multipart/form-data">
           
            @csrf
           
            <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label for="">Subtitle</label>
                <input type="text" name="sub_title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Description</label>
                <textarea type="text" name="description" class="form-control" > </textarea>
            </div>
            <div class="form-group mb-3">
                <label for="">Image</label><br>
                <img style="height:250px; width:250px;" src="" >
                <input type="file" name="image" class="form-control">
            </div>
           
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save </button>
            </div>

        </form>
       
        
    </div>
</main>
@endsection