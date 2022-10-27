@extends('template.main')
@section('content')
<form>
  @csrf
  @method('POST')
  @include('admin.users.partials.view')
</form>
@endsection