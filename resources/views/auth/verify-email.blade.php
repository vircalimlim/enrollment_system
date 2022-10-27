@extends('template.main')
@section('content')
<div id="form-container-base">
  <span id="form-header">Verify Email</span>
  <i class="fi fi-rr-interface" style="font-size: 100px; margin: 3rem 0;"></i>
  <p style="font-size: 14px;">You must verify your email address to access administrator page. <br> Please click button below for confimation.</p>
  <br>
  <div class="form-field">
    <form method="POST" action="{{route('verification.send')}}">
      @csrf
      <button type="submit" id="resend-verification"> <i class="fi fi-rr-interface"></i> Resend Verification Email</button>
    </form>
  </div>
</div>

@endsection