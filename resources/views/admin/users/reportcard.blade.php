@extends('template.main')
@section('content')
<div id="enrollment-form">
      <div id="enrollform-base">
            <span id="asa">SF9/Report Card</span>
            <br>
            <a href="{{asset('requirements/'.$user->reportcard)}}" id="requirement-image">
                  <img src="{{asset('requirements/'.$user->reportcard)}}" id="requirement-image">
            </a>
            <hr>
            <a href="{{ URL::previous() }}" id="back"><i class="fi fi-rr-arrow-left"></i> Back</a>
      </div>
</div>
@endsection