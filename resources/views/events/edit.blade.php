@extends('layouts.admin')
@section('content')
<form action="{{url('/events/'.$event['id'])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <input class="form-control" type="text" name="name" placeholder="Name" required value="{{$event['name']}}"/>        
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{url('/events')}}">Back</a>
</form>
@endsection