@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{ route('project.index') }}" class="btn btn-warning">Back</a>
</div>
<br />
<form method="post" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ (old('name')) ? old('name') : $project->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <input id="status_id" type="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id"
                value="{{ (old('status_id')) ? old('status_id') : $project->status_id }}"  autocomplete="status_id">

            @error('status_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Leader') }}</label>

        <div class="col-md-6">
            <input id="leader" type="text" class="form-control @error('leader') is-invalid @enderror" name="leader"
                value="{{ (old('leader')) ? old('leader') : $project->leader }}" required autocomplete="leader" autofocus>

            @error('leader')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Start_time') }}</label>

        <div class="col-md-6">
            <input id="start_time" type="text" class="form-control @error('start_time') is-invalid @enderror" name="start_time"
                value="{{ (old('start_time')) ? old('start_time') : $project->start_time }}" required autocomplete="start_time" autofocus>

            @error('start_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('End_time') }}</label>

        <div class="col-md-6">
            <input id="end_time" type="text" class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                value="{{ (old('end_time')) ? old('end_time') : $project->end_time }}" required autocomplete="end_time" autofocus>

            @error('end_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Customer') }}</label>

        <div class="col-md-6">
            <input id="customer_id" type="text" class="form-control @error('customer_id') is-invalid @enderror" name="customer_id"
                value="{{ (old('customer_id')) ? old('customer_id') : $project->customer_id }}" required autocomplete="customer_id" autofocus>

            @error('customer_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group text-center">
        <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
    </div>
</form>
@endsection
