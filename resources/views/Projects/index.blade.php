@extends('layouts.admin')

@section('content')

<div class="w-100 pb-3 d-flex justify-content-center">
    <i class="fas fa-layer-group fa-2x"></i>
    <h2 class="ml-1">Manage Projects</h2>
</div>

<div class="d-flex">
    <form class="form-inline" method="get" action="{{ route('project.search') }}">
        <input class="form-control" type="text" placeholder="Name" aria-label="Search" name="searchName"></th>
        <input class="form-control" type="text" placeholder="Status" aria-label="Search" name="searchStatus"></th>
        <input class="form-control" type="text" placeholder="Customer" aria-label="Search" name="searchCustomer"></th>
        <button type="submit" class="btn btn-outline-primary"> <i class="fa fa-search"></i>
            Search</button>
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

<div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{ route('project.create') }}"> Add projects</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="bg-dark-gradient">
            <th>Name</th>
            <th>Status</th>
            <th>Leader</th>
            <th>Start-time</th>
            <th>End-time</th>
            <th>Customer</th>
            <th>Action</th>
        </tr>
        @foreach($projects as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->status_id }}</td>
            <td>{{ $row->leader }}</td>
            <td>{{ $row->start_time }}</td>
            <td>{{ $row->end_time }}</td>
            <td>{{ $row->customer }}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <div>
                        <a class="btn btn-default" href="{{ route('project.edit', $row->id) }}">Edit</a>
                    </div>
                    <div class="">
                        <form action="{{ route('project.destroy', $row->id) }}" method="POST">
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
        {{ $projects->appends($_GET)->links() }}
    </div>
</div>

@endsection
