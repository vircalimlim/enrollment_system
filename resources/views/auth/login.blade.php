@extends('template.main')
@section('content')

<div id="form-container-base">
  <span id="form-header">Log In</span>
  <br>

  <form method="POST" action="{{route('login') }}">
    @csrf
    <div class="form-field">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid | @enderror" id="email" aria-describedby="email" value="{{old('email')}}">
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>

    <div class="form-field">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="@error('password') is-invalid |@enderror">
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>

    <div class="form-field">
      <button type="submit" id="login-btn">Login</button>
    </div>

    <div id="help-sec">
      <a href="{{route('password.request')}}">Reset Password</a>
      <a href="{{route('password.request')}}">My application form has been accepted  <br> / denied but I haven't received an email</a>
    </div>

  </form>
</div>
@endsection
 