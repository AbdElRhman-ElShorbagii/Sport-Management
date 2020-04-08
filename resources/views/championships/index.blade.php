@extends('layouts.admin')
@section('content')

<a href="{{url('championships/create')}}" class="btn btn-success">Create</a>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($championships as $c)
    <tr>
            <td>{{$c['id']}}</td>
            <td>{{$c['name']}}</td>
            <td>{{$c['start_date']}}</td>
            <td>{{$c['end_date']}}</td>
            <td>
                <a href="{{url('/championships/'.$c['id'].'/edit')}}" class="btn btn-primary">Edit</a>
            </td>
        <td>
            <form action="{{url('/championships/'.$c['id'])}}" method="POST">
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