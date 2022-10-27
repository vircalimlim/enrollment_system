@extends('template.main')
@section('content')

<div id="form-container-base">

  <br>

  <form method="POST" action="{{route('admin.issue_reports_view.store') }}">
    @csrf


   <div class="form-field" id="LRNyes">
        <label for="lrnnumber">Learner's Reference Number(LRN)</label>
        <input placeholder="12 Digits" name="lrnnumber" type="number" class="@error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber" value="{{old('lrnnumber')}}" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
        @error('lrnnumber')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
          <div class="form-field">
      <label for="title">Subject</label>
      <input type="text" name="title" class="@error('title') is-invalid | @enderror" id="title" aria-describedby="title" value="" required>
      @error('title')
      <span class="invalid-feedback" role="alert">
        {{$message}}
      </span>
      @enderror
    </div>
    <div class="form-field">
      <div class="form-group">
        <label for="comment">Content:</label>
        <textarea class="form-control" rows="5" id="comment" name="specification" required></textarea>
      </div>
    </div>
    <div class="form-field">
      <button type="submit" id="login-btn">Submit</button>
    </div>


  </form>
</div>
@endsection
