@extends('layouts.admin')

@section('content')

<div class="w-100 pb-3 d-flex justify-content-center">
    <i class="fas fa-people-carry fa-2x"></i>
    <h2 class="ml-1">Manage Members</h2>
</div>

<div class="">
    <form class="form-inline d-flex" method="get" action="{{ route('members.search') }}">      
            <div>
                <input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Name" aria-label="Search" name="searchName">
            </div>

            <div>
                <input class="form-control ml-2" type="text" value="{{ request()->input('searchEmail') }}" placeholder="Email" aria-label="Search" name="searchEmail">
            </div>

            <div>
                <input class="form-control ml-2" type="text" value="{{ request()->input('searchPhone') }}" placeholder="Phone" aria-label="Search" name="searchPhone">
            </div>

            <div>
                <select name="searchRole" class="ml-2 form-control col-auto @error('is_admin') is-invalid @enderror"
                    value="{{ old('is_admin') }}" autocomplete="is_admin">              
                    @foreach (App\Models\Member::IS_ADMIN as $key => $value)
                    <option value="" disabled selected>Search Role</option>
                    <option value="{{ $key }}" @if(request('searchRole')==$key) selected @endif>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-outline-primary ml-2"> <i class="fa fa-search"></i>
                    Search</button>
            </div>
    </form>
</div>

<div class="w-100 d-flex text-center">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;
        </a> {{ session('success') }}
    </div>
    @endif
</div>
<div class="mt-3 d-flex justify-content-end">
    <a class="btn btn-success" href="{{ route('members.create') }}"> Add Members</a>
</div>

<div class="mt-3 table-responsive">
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
            <td><img src="{{ asset("storage/images/$row->image") }}" style=" height: 50px; object-fit: contain;"
                    alt="avatar"></td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->address }}</td>
            <td>{{ $row->is_admin_label }}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <div>
                        <a class="btn btn-outline-primary mr-2" href="{{ route('members.edit', $row->id) }}">Edit</a>
                    </div>
                    <div class="">
                        <form action="{{ route('members.destroy', $row->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger">Delete</button>
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