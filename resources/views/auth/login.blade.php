@extends('layouts.admin')

@section('content')
<div id="app" class="row">
  <div class="col-8 mx-auto">
  <form method="POST" action="{{ route('login') }}">
    <div class="card">

      <div class="card-header text-center bg-info text-white">
        {{ __('messages.Login') }}
      </div>

      <div class="card-body">
        @csrf

        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
              name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

          <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
              name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6 offset-md-4">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
              </label>
            </div>
          </div>
        </div>

      </div>
      <div class="card-footer">
        <div class="form-group text-center">
          <button type="submit" class="btn btn-info">{{ __('messages.Login') }}</button>
        </div>
      </div>
  </form>
  </div>
</div>
@endsection