@extends('layouts.admin')
@section('content')
<form action="{{url('/events')}}" method="POST">
    {{ csrf_field() }}    
    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">   
        <input class="form-control" type="text" name="name" placeholder="Name" required value="{{old('name')}}"/>
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{url('/events')}}">Back</a>
</form>
@endsection