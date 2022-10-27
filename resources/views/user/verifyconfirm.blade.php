@extends('template.main')

@section('content')
<center id="form-top-header">
	<img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
	<span id="school-name">Basista National High School</span>
	<span id="school-location">Basista, Pangasinan</span>
</center>
<hr>
<br>
<br>
<h2>Welcome to Basista National HighSchool Enrolment System!</h2>
<h6 style="text-align:center;">Your email is now verified. Thank you for your cooperation</h6>
<br>
<a role="button" href="{{url('login')}}" id="return-login-btn">Log In <i class="fi fi-rr-enter" style="line-height: 0 !important"></i></a>
@endsection