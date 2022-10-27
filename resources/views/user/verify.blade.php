@extends('template.main')
@section('content')

<div id="form-container-base">
  <span id="form-header">Verify Email Address</span>
  <p>Warning: Applications with unverified emails will not be entertained by the administrator</p>
  <br>

  <form method="POST" action="{{route('user.resend') }}">
    @method('GET')
    @csrf
    <div class="form-field">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{$email}}" required readonly>
      @error('email')
      <span class="invalid-feedback" role="alert">
      </span>
      @enderror
    </div>
    <div class="form-field-row">

      <button type="submit" id="resend-verification-email-btn">Resend verification</button>
    </div>
  </form>
</div>

@endsection