@extends('layouts.admin')
@section('content')
<a href="{{url('clubs/create')}}" class="btn btn-success">Create</a>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Actions</th>            
        </tr>
    </thead>
    <tbody>
    @foreach($clubs as $club)        
    <tr>
            <td>{{$club['id']}}</td>
            <td>{{$club['name']}}</td>  

            <td>
                <a href="{{url('/clubs/'.$club['id'].'/edit')}}" class="btn btn-primary">Edit</a>
            </td>
        <td>
            <form action="{{url('/clubs/'.$club['id'])}}" method="POST">
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