@extends('backend.master')
@section('main_content')
 <main>
    <div class="container-fluid ">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Main</li>
            
        </ol>
        @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <h4 class="alert-heading">Success!{{ session('message') }}</h4>    

        </div>
            @endif
        

        <form action="{{ url('mainup') }}" method="POST" enctype="multipart/form-data">
           
            @csrf
           
            <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$main->title}}">
            </div>
            <div class="form-group mb-3">
                <label for="">Subtitle</label>
                <input type="text" name="sub_title" class="form-control"value="{{$main->sub_title}}">
            </div>
            <div class="form-group mb-3">
                <label for="">Image</label><br>
                <img style="height:150px; width:150px;" src="{{asset('/storage/img/'.$main->bg_image)}}" >
                <input type="file" name="bg_image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Resume</label>
                <input type="file" name="resume" class="form-control">
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save </button>
            </div>

        </form>
       
        
    </div>
</main>
@endsection