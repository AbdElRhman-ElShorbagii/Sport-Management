<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Illuminate\Http\Request;
use Session;
use Validator;
use \App\Championship;

class ChampionshipController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $championships = Championship::all();
        return view('championships.index')->with('championships', $championships);
    }

    public function show()
    {

    }

    public function create()
    {
        if (Gate::allows('add-championship')) {
            return view('championships.create');
        }
        abort(404);
    }

    public function store(Request $request)
    {

        if (Auth::user()->can('create', Championship::class)) {
            //

            $validator = Validator::make($request->all(), Championship::rules());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $championship = new Championship($request->all());
            $championship->save();
            Session::flash('message', 'Record Created Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/championships');
        }
        abort(404);
    }

    public function edit($id)
    {
        $championship = Championship::findOrFail($id);
        return view('championships.edit')->with('championship', $championship);
    }

    public function update($id, Request $request)
    {
        $championship = Championship::findOrFail($id);
        // $championship['name']=$request['name'];
        // $championship['start_date']=$request['start_date'];
        // $championship['end_date']=$request['end_date'];
        $championship->fill($request->all());
        $championship->save();
        Session::flash('message', 'Record Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/championships');
    }

    public function destroy($id)
    {
        $championship = Championship::findOrFail($id);
        $championship->delete();
        Session::flash('message', 'Record Deleted Successfully!');
        Session::flash('alert-class', 'alert-warning');
        return redirect('/championships');
    }
}
