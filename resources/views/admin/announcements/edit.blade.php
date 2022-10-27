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

   <form action="{{route('admin.announcements.update',$announcement->id) }}" method ="POST" enctype="multipart/form-data" >
              @method("PATCH")
              @csrf
  <div class="card-body">

    <div class="text-center">
        <img src="{{asset('requirements/'.$announcement->image)}}" style="max-width:20%;" class="img-thumbnail"> 
    </div>
    <div class="form-field">
      <label for="title">Title</label>
        <input name="title" type="text" class="form-control @error('title') is-invalid |@enderror" id="title" aria-describedby="title" value="{{$announcement->title}}" required>
        @error('title')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>
          <div class="enrollment-form-field" style="grid-template-columns: 2fr 2fr">
      <div class="form-field">
        <label for="documents">Announcement Photo:</label>
        <div style="width: 100%;" class="file-upload" id="file-upload">
          <div class="file-select">
            <div class="file-select-button" id="fileName">Upload Photo</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="chooseFile" type="file" class="@error('chooseFile') is-invalid |@enderror" id="chooseFile" aria-describedby="chooseFile" value="{{$announcement->image}}" >
            @error('chooseFile')
            <span class="invalid-feedback" role="alert">
              {{$message}}
            </span>
            @enderror
          </div>
        </div>
      </div>
   
    </div>
        <div class="form-group">
          <label for="specification">Content:</label>
        <textarea class="form-control" id="specification" rows="20"  name="specification" style=" width:1500px;" required>{{$announcement->content}}</textarea>
      </div>
  
  </div>
  <div class="card-footer text-muted">
    <div class="enrollment-form-field">
      <button style="font-size: 14px;" class="btn btn-success">Submit</button>
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>
</div>

</form>
@endsection