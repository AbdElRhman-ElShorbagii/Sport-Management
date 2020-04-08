<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;
use Validator;
use Session;
class EventController extends Controller
{
    function index(){
        $events=Event::all();        
        return view('events.index')->with('events',$events);
    }

    function show(){

    }

    function create(){
        return view('events.create');
    }

    function store(Request $request){        
        $validator = Validator::make($request->all(),Event::rules());
        if ($validator->fails())
        {           
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $event = new Event($request->all());
        $event->save();
        Session::flash('message', 'Record Created Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/events');
    }

    function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit')->with('event',$event);
    }

    function update($id,Request $request){
        $event = Event::findOrFail($id);
        // $event['name']=$request['name'];
        // $event['start_date']=$request['start_date'];
        // $event['end_date']=$request['end_date'];
        $event->fill($request->all());
        $event->save();
        Session::flash('message', 'Record Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/events');
    }

    function destroy($id){
        $event = Event::findOrFail($id);        
        $event->delete();
        Session::flash('message', 'Record Deleted Successfully!'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect('/events');
    }
}