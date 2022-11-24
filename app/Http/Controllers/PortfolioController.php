<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function create(){
        return view( 'backend.portfolio.create');
    }

    public function store(Request $request){

        $portfolio = New Portfolio();
        $portfolio->title = $request->input('title');
        $portfolio->sub_title = $request->input('sub_title');
        $portfolio->description = $request->input('description');
        $portfolio->category = $request->input('category');

        if ($imagee = $request->file('big_image')) {
            $destinationPath = 'storage/bimg/';
            $profileImage = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $profileImage);
            $portfolio['big_image'] = "$profileImage";
            
        }
        if ($image = $request->file('small_image')) {
            $destinationPath = 'storage/simg/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $portfolio['small_image'] = "$profileImage";
            
        }
        $portfolio->save();
        return redirect('/portfolio/create')->with('message','Portfolio Created');
        
    }

    public function list(){

        $portfolios = Portfolio::all();
        return view( 'backend.portfolio.list',compact('portfolios'));
    }

    public function edit($id){

        $portfolios = Portfolio::find($id);
       
        return view( 'backend.portfolio.edit',compact('portfolios'));
    }

    public function update(Request $request, $id){
        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->input('title');
        $portfolio->sub_title = $request->input('sub_title');
        $portfolio->description = $request->input('description');
        $portfolio->category = $request->input('category');

        if ($imagee = $request->file('big_image')) {
            $destinationPath = 'storage/bimg/';
            $profileImage = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $profileImage);
            $portfolio['big_image'] = "$profileImage";
            
        }else{
            unset($portfolio['big_image']);
        }

        if ($image = $request->file('small_image')) {
            $destinationPath = 'storage/simg/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $portfolio['small_image'] = "$profileImage";
            
        }else{
            unset($portfolio['small_image']);
        }

        
        $portfolio->save();
        return redirect('/portfolio/list')->with('message','Portfolio Updated');
    }
   public function destroy($id){
    $portfolio = Portfolio::find($id);
    $portfolio->delete();
     
    return redirect('/portfolio/list')->with('message','Service Deleted');
   }
}
