@extends('layouts.admin')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="{{ route('members.search') }}">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" placeholder="Name" aria-label="Search"
                            name="searchName"></th>
                    <th><input class="form-control" type="text" placeholder="Email" aria-label="Search"
                            name="searchEmail"></th>
                    <th><input class="form-control" type="text" placeholder="Phone" aria-label="Search"
                            name="searchPhone"></th>
                    <th>
                        <select name="searchPosition"
                            class="form-control col-auto @error('is_admin') is-invalid @enderror"
                            value="{{ old('is_admin') }}" autocomplete="is_admin">
                            <option value=""></option>
                            @foreach (App\Models\Member::IS_ADMIN as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <button type="submit" class="btn btn-outline-primary"> <i class="fa fa-search"></i> Search</button>
                    </th>
                </table>
            </div>
        </form>
    </div>


</div>
<div class="d-flex justify-content-end">
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
        @foreach($members as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->image }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->is_admin_label }}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <div>
                        <a class="btn btn-default" href="{{ route('members.edit', $row->id) }}">Edit</a>
                    </div>
                    <div class="">
                        <form action="{{ route('members.destroy', $row->id) }}" method="POST">
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
    {{ $members->links() }}
</div>
@endsection