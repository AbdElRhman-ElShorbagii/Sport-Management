@extends('layouts.admin')
@section('content')
<a href="{{url('events/create')}}" class="btn btn-success">Create</a>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Actions</th>            
        </tr>
    </thead>
    <tbody>
    @foreach($events as $event)        
    <tr>
            <td>{{$event['id']}}</td>
            <td>{{$event['name']}}</td>  

            <td>
                <a href="{{url('/events/'.$event['id'].'/edit')}}" class="btn btn-primary">Edit</a>
            </td>
        <td>
            <form action="{{url('/events/'.$event['id'])}}" method="POST">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
            </form>
        </td>

        </tr>
    @endforeach
    </tbody>
</table>    
@endsection