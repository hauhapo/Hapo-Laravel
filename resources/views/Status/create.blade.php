@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb pb-3">
        <div class="pull-left">
            <h2>Add status</h2>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-warning" href="{{ route('status.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('status.store') }}" method="POST" enctype="multipart/form-data">

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

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div>

</form>
@endsection
