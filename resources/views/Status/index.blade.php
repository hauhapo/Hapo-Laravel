@extends('layouts.admin')

@section('content')

<div class="w-100 pb-3 d-flex justify-content-center">
    <i class="fas fa-smoking fa-2x"></i>
    <h2 class="ml-2">Status</h2>
</div>

<div class="d-flex">
    <form class="form-inline" method="get" action="{{ route('status.search') }}">
        <input class="form-control" type="text" value="{{ request()->input('searchName') }}" placeholder="Search name" aria-label="Search" name="searchName">
        <button type="submit" class="btn btn-outline-dark ml-2"> <i class="fa fa-search"></i>
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

<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-success" href="{{ route('status.create') }}">Add status</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="bg-dark-gradient">
            <th>Name</th>
            <th class="w-50">Action</th>
        </tr>
        @foreach($status as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <div>
                        <a class="btn btn-outline-primary" href="{{ route('status.edit', $row->id) }}">Edit</a>
                    </div>
                    <div class="ml-2">
                        <form action="{{ route('status.destroy', $row->id) }}" method="POST">
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
</div>
@endsection
