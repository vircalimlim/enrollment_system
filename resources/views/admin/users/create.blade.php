@extends('template.main')
@section('content')
<div id="form-container-base">
	<span id="form-header">Create Admin Account</span>
	<br>

	<form method="POST" action=" {{route('admin.users.store') }}">
		@include('admin.users.partials.form',['create' => true])
	</form>
</div>
@endsection