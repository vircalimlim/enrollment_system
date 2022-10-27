@extends('template.main')
@section('content')

<div id="form-container-base">
  <span id="form-header">Send Request</span>
  <br>

  <form method="POST" action="{{route('user.requestuser') }}">
    @csrf
    <div class="form-field">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid |@enderror" id="email" aria-describedby="email" value={{old('email')}}>
      @error('email')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field-row">
      <a href={{url('login') }} id="back"><i class="fi fi-rr-angle-left"></i></a>
      <button type="submit" id="send-reset-request-btn">Send reset request</button>
    </div>
  </form>
</div>

@endsection