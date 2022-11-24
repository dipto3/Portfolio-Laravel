@extends('backend.master')
@section('main_content')
<div class="container-fluid ">
    <h1 class="mt-4">About</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List</li>
        
    </ol>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <h4 class="alert-heading">Success!{{ session('message') }}</h4>    

    </div>
        @endif

        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th style="width: 5%;"scope="col">ID</th>
                <th style="width: 10%;"scope="col">Title</th>
                <th style="width: 10%;"scope="col">SubTitle</th>
                <th style="width: 40%;"scope="col">Description</th>
                <th style="width: 15%;"scope="col">Image</th>
                <th style="width: 20%;"scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                <tr>
                    <th  scope="row">{{$about->id}}</th>
                    <td>{{$about->title}}</td>
                    <td>{{$about->sub_title}}</td>
                    <td>{{$about->description}}</td>
                    <td>
                        <img style="height:80px; width:100px;"src="{{asset('/storage/aboutimg/'.$about->image)}}" alt="">
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 ">
                                <a class="btn btn-primary" href="{{url('/about/edit'.$about->id)}}">Edit</a>
                            </div>
                            <div class="col-sm-4 ">
                            <form action="{{url('/about/create/destroy'.$about->id)}}" method="POST">
                                @csrf
                               
                                <div class="">
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                        </div>
                           
                    </td>
                    
                  </tr>
                @endforeach
             
              
            </tbody>
          </table>

</div>
@endsection