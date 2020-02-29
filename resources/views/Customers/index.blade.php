@extends('layouts.admin')

@section('content')

<div class="w-100 pb-3 d-flex justify-content-center">
    <i class="fa fa-users-cog fa-2x"></i>
    <h2 class="ml-1">Manage Customers</h2>
</div>

<div class="d-flex">
    <form class="form-inline" method="get" action="{{ route('customer.search') }}">
        <input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Name" aria-label="Search" name="searchName">
        <input class="form-control ml-3" type="text" value="{{ request()->input('searchEmail') }}" placeholder="Email" aria-label="Search" name="searchEmail">
        <input class="form-control ml-3" type="text" value="{{ request()->input('searchPhone') }}" placeholder="Phone" aria-label="Search" name="searchPhone">
        <button type="submit" class="btn btn-outline-success ml-3"> <i class="fa fa-search"></i>
            Search</button>
    </form>
</div>

<div class="w-100 d-flex text-center mt-2">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;
        </a> {{ session('success') }}
    </div>
    @endif
</div>

<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-success" href="{{ route('customer.create') }}"> Add customers</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="bg-dark-gradient">
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        @foreach($customers as $row)
        <tr>
            <td><img src="{{ asset("storage/images/$row->image") }}" style=" height: 50px; object-fit: contain;"
                    alt="avatar"></td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->address }}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <div>
                        <a class="btn btn-default" href="{{ route('customer.edit', $row->id) }}">Edit</a>
                    </div>
                    <div class="">
                        <form action="{{ route('customer.destroy', $row->id) }}" method="POST">
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
    <div class="d-flex justify-content-end">
        {{ $customers->appends($_GET)->links() }}
    </div>
</div>
</div>
@endsection