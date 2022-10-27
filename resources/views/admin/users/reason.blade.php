@extends('template.main')

@section('content')
<div id="enrollment-form">
  <div id="enrollform-base">
    <span id="asa">Define reason for enrolment application rejection</span>
    <br>
    <form action="{{route('admin.users.destroy',$user->id) }}" method="POST">
      @method("DELETE")
      @include('admin.users.partials.delete')
    </form>
  </div>
</div>
@endsection