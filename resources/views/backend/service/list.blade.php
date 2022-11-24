@extends('backend.master')
@section('main_content')
<div class="container-fluid ">
    <h1 class="mt-4">Service</h1>
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
                <th style="width: 4%;"scope="col">ID</th>
                <th style="width: 20%;"scope="col">Icon</th>
                <th style="width: 15%;"scope="col">Title</th>
                <th style="width: 46%;"scope="col">Description</th>
                <th style="width: 15%;"scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <th  scope="row">{{$service->id}}</th>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->description}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 ">
                                <a class="btn btn-primary" href="{{url('/service/edit'.$service->id)}}">Edit</a>
                            </div>
                            <div class="col-sm-4 ">
                            <form action="{{url('/service/create/destroy'.$service->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
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