@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb pb-3">
        <div class="pull-left">
            <h2>Add tasks</h2>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-warning" href="{{ route('task.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <input id="status_id" type="status_id" class="form-control @error('status_id') is-invalid @enderror"
                name="status_id" value="{{ old('status_id') }}" required autocomplete="status_id">

            @error('status_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Start_time') }}</label>

        <div class="col-md-6">
            <input id="start_time" type="text" class=" date form-control @error('start_time') is-invalid @enderror"
                name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>

            @error('start_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('End_time') }}</label>

        <div class="col-md-6">
            <input id="end_time" type="text" class="date form-control @error('end_time') is-invalid @enderror"
                name="end_time" value="{{ old('end_time') }}" required autocomplete="end_time" autofocus>

            @error('end_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- <div class="form-group row">
        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Customer') }}</label>

        <div class="col-md-6">
            <select multiple = 'multiple' id="customer_id"
                class="form-control @error('customer_id') is-invalid @enderror" name="customer_id"
                value="{{ old('customer_id') }}" required autocomplete="customer_id" autofocus>
                <option>orange</option>
                <option>white</option>
                <option>purple</option>
            </select>
            @error('customer_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div>

</form>
@endsection