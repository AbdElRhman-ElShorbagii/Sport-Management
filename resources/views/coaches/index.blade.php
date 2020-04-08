@extends('layouts.admin')
@section('content')
<a href="{{url('coaches/create')}}" class="btn btn-success">Create</a>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Club Name</th>
            <th>Actions</th>            
        </tr>
    </thead>
    <tbody>
    
    @foreach($coaches as $coach)        
    <tr>
            <td>{{$coach['id']}}</td>
            <td>{{$coach['name']}}</td>  
            <td>            
                {{$coach->club()->first()['name']}}
            </td>
            <td>
                <a href="{{url('/coaches/'.$coach['id'].'/edit')}}" class="btn btn-primary">Edit</a>
            </td>
        <td>
            <form action="{{url('/coaches/'.$coach['id'])}}" method="POST">
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