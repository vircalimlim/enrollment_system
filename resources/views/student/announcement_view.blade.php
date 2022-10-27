@extends('template.main')
@section('content')
<div class="card text-center">
  <div class="card-header">
    
 <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>

  </div>
  <div class="card-body">
    <h5 class="card-title">{{$announcement->title}}</h5>
    <div class="text-center">
        <img src="{{asset('requirements/'.$announcement->image)}}" style="max-width:40%;" class="rounded float-left"> 
    </div>
    <p class="card-text">{{$announcement->content}}</p>
  
  </div>
  <div class="card-footer text-muted">
    <div class="enrollment-form-field">
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>
</div>
@endsection