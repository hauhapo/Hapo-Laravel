@extends('layouts.admin')

@section('content')

<div align="right">
    <a href="{{ route('customer.index') }}" class="btn btn-warning">Back</a>
</div>
<br />
<form method="post" action="{{ route('customer.update', $customer->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ (old('name')) ? old('name') : $customer->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ (old('email')) ? old('email') : $customer->email }}"  autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ (old('phone')) ? old('phone') : $customer->phone }}" required autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                value="{{ (old('address')) ? old('address') : $customer->address }}" required autocomplete="address" autofocus>

            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

        <div class="col-md-6">
            <input id="email" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image"
                value="" autocomplete="image">
            <img class="w-25" src="{{ asset("storage/images/$customer->image") }}" alt="image" />
            <input type="hidden" name="hidden_image" value="{{ $customer->image }}">
            

            @error('image')
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
