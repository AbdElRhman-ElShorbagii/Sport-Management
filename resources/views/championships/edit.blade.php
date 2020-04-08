@extends('layouts.admin')
@section('content')
<form action="{{url('/championships/'.$championship['id'])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <input class="form-control" type="text" name="name" placeholder="Name" required value="{{$championship['name']}}"/>    
    <input class="form-control" type="text" name="start_date"  value="{{$championship['start_date']}}"/>
    <input class="form-control" type="text" name="end_date"  value="{{$championship['end_date']}}"/>
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{url('/championships')}}">Back</a>
</form>
@endsection