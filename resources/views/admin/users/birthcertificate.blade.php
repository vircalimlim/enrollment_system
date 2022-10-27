@extends('template.main')
@section('content')
<div id="enrollment-form">
      <div id="enrollform-base">
            <span id="asa">NSO/PSA/Birth Certificate</span>
            <br>
            <a href="{{asset('requirements/'.$user->birthcertificate)}}" id="requirement-image">
                  <img src="{{asset('requirements/'.$user->birthcertificate)}}" id="requirement-image">
            </a>
            <hr>
            <a href="{{ URL::previous() }}"id="back"><i class="fi fi-rr-arrow-left"></i> Back</a>
      </div>
</div>
@endsection