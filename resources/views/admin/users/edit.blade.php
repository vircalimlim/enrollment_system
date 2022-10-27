@extends('template.main')
@section('content')
<div id="enrollment-form">
  <div id="enrollform-base">
    <span id="asa">Activate Student Account</span>
    <br>
  
    <hr>
    <form method="POST" action=" {{route('admin.users.update',$user->id) }}">
      @method('PATCH')
      @include('admin.users.partials.accept')
    </form>
  </div>
</div>
@endsection