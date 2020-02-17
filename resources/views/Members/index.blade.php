@extends('layouts.admin')

@section('content')
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

                                    <button type="submit" class="btn btn-default">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
