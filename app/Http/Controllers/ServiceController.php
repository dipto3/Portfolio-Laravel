<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create(){
        return view( 'backend.service.create');
    }

    public function store(Request $request){

        $service = New Service;
        $service->icon = $request->input('icon');
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        $service->save();
        return redirect('/service/create')->with('message','Content Updated');
        
    }

    public function list(){

        $services = Service::all();
        return view( 'backend.service.list',compact('services'));
    }

    public function edit($id){

        $services = Service::find($id);
       
        return view( 'backend.service.edit',compact('services'));
    }

    public function update(Request $request,$id){
        $service = Service::find($id);
        $service->icon = $request->input('icon');
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        $service->save();
        return redirect('/service/list')->with('message','Service Updated');
    }
   public function destroy( $id){
    $service = Service::find($id);
    $service->delete();
     
    return redirect('/service/list')->with('message','Service Deleted');
   }
}
