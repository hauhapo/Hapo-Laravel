@extends('layouts.admin')

@section('content')

<form method="post" action="{{ route('status.update', $status->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row mt-5">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ (old('name')) ? old('name') : $status->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group text-center mr-2">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </div>
        <div>
            <a href="{{ route('status.index') }}" class="btn btn-warning">Back</a>
        </div>
    </div>

</form>

@endsection