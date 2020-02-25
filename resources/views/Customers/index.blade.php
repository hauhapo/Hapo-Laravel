@extends('layouts.admin')

@section('content')

<div class="d-flex">
    <form class="form-inline" method="get" action="{{ route('customer.search') }}">
        <input class="form-control" type="text" placeholder="Name" aria-label="Search" name="searchName"></th>
        <input class="form-control" type="text" placeholder="Email" aria-label="Search" name="searchEmail"></th>
        <input class="form-control" type="text" placeholder="Phone" aria-label="Search" name="searchPhone"></th>
        <button type="submit" class="btn btn-outline-primary"> <i class="fa fa-search"></i>
            Search</button>
    </form>
</div>

<div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{ route('customer.create') }}"> Add customers</a>
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
            <th>Action</th>
        </tr>
        @foreach($customers as $row)
        <tr>
            <td><img src="{{ asset("storage/images/$row->image") }}" style=" height: 50px; object-fit: contain;" alt = "avatar"></td>
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
