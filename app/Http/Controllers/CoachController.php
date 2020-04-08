<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Coach;
use \App\Club;
use Validator;
use Session;
class CoachController extends Controller
{
    function index(){
        $coaches=Coach::all();        
        return view('coaches.index')->with('coaches',$coaches);
    }

    function show(){

    }

    function create(){
        $clubs=Club::pluck('name','id');
        //Pluck function is used to extract the key and value
        //From the table
        return view('coaches.create')->with('clubs',$clubs);
    }

    function store(Request $request){        
        $validator = Validator::make($request->all(),Coach::rules());
        if ($validator->fails())
        {           
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $coach = new Coach($request->all());
        $coach->save();        
        Session::flash('message', 'Record Created Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/coaches');
    }

    function edit($id){
        $coach = Coach::findOrFail($id);
        $clubs=Club::pluck('name','id');
        return view('coaches.edit')->with([
            'coach'=>$coach,
            'clubs'=>$clubs
            ]);
    }

    function update($id,Request $request){        
        // $path = $request->file('pic')->store('app');

        $coach = Coach::findOrFail($id);        
        $coach->fill($request->all());
        $coach->save();
        Session::flash('message', 'Record Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/coaches');
    }

    function destroy($id){
        $coach = Coach::findOrFail($id);        
        $coach->delete();
        Session::flash('message', 'Record Deleted Successfully!'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect('/coaches');
    }
}