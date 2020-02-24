@extends('layouts.admin')

@section('content')

<div class="d-flex">
    <form class="form-inline" method="get" action="{{ route('members.search') }}">

        <input class="form-control" type="text" placeholder="Name" aria-label="Search" name="searchName"></th>
        <input class="form-control" type="text" placeholder="Email" aria-label="Search" name="searchEmail"></th>
        <input class="form-control" type="text" placeholder="Phone" aria-label="Search" name="searchPhone"></th>

        <select name="searchRole" class="form-control col-auto @error('is_admin') is-invalid @enderror"
            value="{{ old('is_admin') }}" autocomplete="is_admin">
            <option value="" disabled selected hidden>Role</option>
            @foreach (App\Models\Member::IS_ADMIN as $key => $value)
            <option placeholder="Role" value="{{ $key }}" @if(request('searchRole') == $key) selected @endif>{{ $value }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-outline-primary"> <i class="fa fa-search"></i>
            Search</button>
    </form>
</div>


<div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{ route('members.create') }}"> Add Members</a>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;
        </a> {{ session('success') }}
    </div>
    @endif
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="bg-dark-gradient">
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach($members as $row)
        <tr>
            <td><img src="{{ asset("storage/images/$row->image") }}" style=" height: 50px; object-fit: contain;" alt = "avatar"></td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->address }}</td>
            <td>{{ $row->is_admin_label }}</td>
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
    <div class="d-flex justify-content-end">
        {{ $members->appends($_GET)->links() }}
    </div>
</div>
</div>
@endsection
