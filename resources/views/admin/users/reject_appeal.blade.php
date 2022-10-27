@extends('template.main')
@section('content')


<div id="form-container-base">
  <span id="form-header">Reject Appeal</span>

  <form method="POST" action="{{route('admin.appeals.destroy',$user->id) }}">
    @method('DELETE')
</div>
@csrf

<div id="activate-student-account-details" class="container-fluid">
  <div class="enrollment-form-field">
 
  
      <input name="id" type="name" class="form-control @error('email') is-invalid |@enderror" id="name" aria-describedby="name" value="{{$appeal->id}} " hidden readonly>

    <div class="form-field">
      <label for="name" class="form-label">First Name</label>
      <input name="name" type="name" class="form-control @error('email') is-invalid |@enderror" id="name" aria-describedby="name" value="{{old('name')}} @isset($user){{$user->name}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="middlename" class="form-label">Middle Name</label>
      <input name="middlename" type="text" class="form-control @error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value="{{old('middlename')}} @isset($user){{$user->middlename}} @endisset " readonly>
    </div>
    <div class="form-field">
      <label for="lastname" class="form-label">Last Name</label>
      <input name="lastname" type="text" class="form-control @error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value="{{old('lastname')}} @isset($user){{$user->lastname}} @endisset " readonly>
    </div>
  </div>
  <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
    <div class="form-field">
      <label for="email" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control @error('email') is-invalid |@enderror" id="email" aria-describedby="email" value="{{old('email')}} @isset($user){{$user->email}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="phonenumber" class="form-label">PhoneNumber</label>
      <input name="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="phonenumber" value="{{old('phonenumber')}} @isset($user){{$user->phonenumber}} @endisset" readonly>
    </div>
  </div>
  <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
    <div class="form-field">
      <label for="gradeleveltoenrolin" class="form-label">Grade Level Requested</label>
      <input name="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value="{{old('gradeleveltoenrolin')}} @isset($user){{$user->gradeleveltoenrolin}} @endisset" readonly>
    </div>
    <div class="form-field">
      <label for="strandtoenrolin" class="form-label">Strand Requested</label>
      <input name="strandtoenrolin" type="text" class="form-control @error('strandtoenrolin') is-invalid |@enderror" id="strandtoenrolin" aria-describedby="strandtoenrolin" value="{{old('strandtoenrolin')}} @isset($user){{$user->strandtoenrolin}} @endisset" readonly>
    </div>
  </div>
  <hr>
  <div class="enrollment-form-field">
    <button style="font-size: 14px;" type="submit" class="btn btn-danger">Reject Appeal</button>
    <a style="font-size: 14px;" class="btn btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View Enrolment Form</a>
    <a style="font-size: 14px;" class="btn btn-warning" href="{{route('admin.users.index',$user->id) }}" role="button">Back</a>
  </div>
</div>
</form>
@endsection