
@extends('backend.master')
@section('main_content')
<div class="container-fluid ">
    <h1 class="mt-4">Portfolio</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Main</li>
        
    </ol>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <h4 class="alert-heading">Success!{{ session('message') }}</h4>    

    </div>
        @endif

        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th style="width: 8%;"scope="col">ID</th>
                <th style="width: 8%;"scope="col">Title</th>
                <th style="width: 8%;"scope="col">SubTitle</th>
                <th style="width: 10%;"scope="col">Big Image</th>
                <th style="width: 10%;"scope="col">Small Image</th>
                <th style="width: 30%;"scope="col">Description</th>
                <th style="width: 10%;"scope="col">Category</th>
                <th style="width: 15%;"scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                <tr>
                    <th  scope="row">{{$portfolio->id}}</th>
                    <td>{{$portfolio->title}}</td>
                    <td>{{$portfolio->sub_title}}</td>
                    <td>
                        <img style="height:80px; width:100px;"src="{{asset('/storage/bimg/'.$portfolio->big_image)}}" alt="">
                    </td>
                    <td>
                        <img style="height:80px; width:100px;"src="{{asset('/storage/simg/'.$portfolio->small_image)}}" alt="">
                    </td>
                    <td>{{$portfolio->description}}</td>
                    <td>{{$portfolio->category}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 ">
                                <a class="btn btn-primary" href="{{url('/portfolio/edit'.$portfolio->id)}}">Edit</a>
                            </div>
                            <div class="col-sm-4 ">
                            <form action="{{url('/portfolio/create/destroy'.$portfolio->id)}}" method="POST">
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