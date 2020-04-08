<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Club;
use Validator;
use Session;
class ClubController extends Controller
{
    function index(){
        $clubs=Club::all();        
        return view('clubs.index')->with('clubs',$clubs);
    }

    function show(){

    }

    function create(){
        return view('clubs.create');
    }

    function store(Request $request){        
        $validator = Validator::make($request->all(),Club::rules());
        if ($validator->fails())
        {           
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $club = new Club($request->all());
        $club->save();
        Session::flash('message', 'Record Created Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/clubs');
    }

    function edit($id){
        $club = Club::findOrFail($id);
        return view('clubs.edit')->with('club',$club);
    }

    function update($id,Request $request){
        $club = Club::findOrFail($id);
        // $club['name']=$request['name'];
        // $club['start_date']=$request['start_date'];
        // $club['end_date']=$request['end_date'];
        $club->fill($request->all());
        $club->save();
        Session::flash('message', 'Record Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/clubs');
    }

    function destroy($id){
        $club = Club::findOrFail($id);        
        $club->delete();
        Session::flash('message', 'Record Deleted Successfully!'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect('/clubs');
    }
}