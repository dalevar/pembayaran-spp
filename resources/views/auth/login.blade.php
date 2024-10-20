@extends('layouts.app')

@section('content')
<div class="col-lg-5 col-12">
  <div id="auth-left">
    <div class="auth-logo">
        <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
    </div>
    <h1 class="auth-title">{{ __('Login.') }}</h1>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      
      <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" id="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <div class="form-control-icon">
          <i class="bi bi-person"></i>
        </div>

        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" id="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
        <div class="form-control-icon">
          <i class="bi bi-shield-lock"></i>
        </div>

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('Login') }}</button>
    </form>
  </div>
</div>
<div class="col-lg-7 d-none d-lg-block">
  <div id="auth-right">

  </div>
</div>
@endsection
