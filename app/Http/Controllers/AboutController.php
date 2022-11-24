<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')
    //     ;
    // }


    public function create(){
        return view ('backend.about.create');
    }

    public function list(){
        $abouts = About::all();
        return view ('backend.about.list',compact('abouts'));
    }

    public function store(Request $request){
        $about = New About();
        $about->title = $request->input('title');
        $about->sub_title = $request->input('sub_title');
        $about->description = $request->input('description');
       

        if ($imagee = $request->file('image')) {
            $destinationPath = 'storage/aboutimg/';
            $profileImage = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $profileImage);
            $about['image'] = "$profileImage";
            
        }
        $about->save();
        return redirect('/about/create')->with('message','About Created');
    }

    public function edit($id){

        $abouts  = About::find($id);
       
        return view( 'backend.about.edit',compact('abouts'));
    }

    public function update(Request $request, $id){
        $about = About::find($id);
        $about->title = $request->input('title');
        $about->sub_title = $request->input('sub_title');
        $about->description = $request->input('description');
        

        if ($imagee = $request->file('image')) {
            $destinationPath = 'storage/aboutimg/';
            $profileImage = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $profileImage);
            $about['image'] = "$profileImage";
            
        }else{
            unset($about['image']);
        }

        $about->save();
        return redirect('/about/list')->with('message','About Updated');


}

    public function destroy($id){
    $portfolio = About::find($id);
    $portfolio->delete();
     
    return redirect('/about/list')->with('message','About Deleted');
   }

}
