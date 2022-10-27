@extends('template.main')

@section('content')
<h1> Accept User</h1>
<div class="card">

<form method = "POST" action="{{route('password.email') }}">
  @csrf
@method('POST')
  @include('admin.users.partials.form')

</form>
</div>
@endsection