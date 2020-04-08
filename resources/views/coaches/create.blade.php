@extends('layouts.admin')
@section('content')
{!! Form::open(['url' => 'coaches']) !!}
    
    {{Form::text('name')}}
    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">   
        <input class="form-control" type="text" name="name" placeholder="Name" required value="{{old('name')}}"/>
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('club_id') ? 'has-error' :'' }}">
        <select class="form-control" name="club_id">
            @foreach($clubs as $id=>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>        
        {!! $errors->first('club_id','<span class="help-block">:message</span>') !!}
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{url('/coaches')}}">Back</a>
    {!! Form::close() !!}
@endsection