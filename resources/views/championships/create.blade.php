@extends('layouts.admin')
@section('content')
<form action="{{url('/championships')}}" method="POST">
    {{ csrf_field() }}    
    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">   
        <input class="form-control" type="text" name="name" placeholder="Name" required value="{{old('name')}}"/>
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('start_date') ? 'has-error' :'' }}">   
        <input class="form-control" type="date" name="start_date" value="{{old('start_date')}}"/>
        {!! $errors->first('start_date','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('end_date') ? 'has-error' :'' }}">   
        <input class="form-control" type="date" name="end_date" value="{{old('start_date')}}"/>
        {!! $errors->first('end_date','<span class="help-block">:message</span>') !!}
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{url('/championships')}}">Back</a>
</form>
@endsection