@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{ route('members.index') }}" class="btn btn-warning">Back</a>
</div>
<br />
<form method="post" action="{{ route('members.update', $member->id) }}" enctype="multipart/form-members">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ (old('name')) ? old('name') : $member->name }}" required autocomplete="name" autofocus>

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
                value="{{ (old('email')) ? old('email') : $member->email }}"  autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ (old('phone')) ? old('phone') : $member->phone }}" required autocomplete="phone" autofocus>

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
                value="{{ (old('address')) ? old('address') : $member->address }}" required autocomplete="address" autofocus>

            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('is_admin') }}</label>

        <div class="col-md-6">
            <select name="is_admin" type="number" class="form-control @error('is_admin') is-invalid @enderror"
                name="is_admin" value="{{ (old('is_admin')) ? old('is_admin') : $member->is_admin }}" required autocomplete="is_admin" autofocus>
                @foreach (App\Models\Member::IS_ADMIN as $key => $label)
                <option value="{{ $key }}" @if(old('is_admin') == $key) selected @elseif($member->is_admin == $key) selected @endif>{{ $label }}</option>
                @endforeach
            </select>
            @error('is_admin')
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
            <img class="w-25" src="{{ asset("storage/images/$member->image") }}" alt="image" />
            <input type="hidden" name="hidden_image" value="{{ $member->image }}">
            

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
