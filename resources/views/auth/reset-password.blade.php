@extends('template.main')
@section('content')

<div id="form-container-base">
  <span id="form-header">Reset Password</span>
  <br>
  <form method="POST" action="{{url('reset-password')}}">
    @csrf
    <input type="hidden" name="token" value="{{$request->token}}">
    <div class="form-field">
      <label for="email">Email address</label>
      <input name="email" type="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{$request->email}}" readonly>
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <label for="password">Password</label>
      <input name="password" type="password" class="@error('password') is-invalid |@enderror" id="password" aria-describedby="password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <label for="password_confirmation">Confirm Password</label>
      <input name="password_confirmation" type="password" class="@error('password_confirmation') is-invalid |@enderror" id="password_confirmation" aria-describedby="password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <button type="submit" id="reset-password">Reset Password</button>
    </div>
  </form>
</div>
@endsection