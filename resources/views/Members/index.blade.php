@extends('layouts.admin')

@section('content')
<div class="pull-right">
    <a class="btn btn-success" href="{{ route('members.create') }}"> Add Members</a>
</div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="bg-dark-gradient">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Is_admin</th>
                <th>Action</th>
            </tr>
            @foreach($Members as $row)
                <tr>
                    <td>{{ $row->first()->id }}</td>
                    <td>{{ $row->image }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->is_admin }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div>
                                <a class="btn btn-default" href="{{ route('members.edit', $row->first()->id) }}">Edit</a>
                            </div>
                            <div class="">
                                <form action="{{ route('members.destroy', $row->first()->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                <a class="btn btn-default">Delete</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $Members->links() }}
        
    </div>
@endsection
