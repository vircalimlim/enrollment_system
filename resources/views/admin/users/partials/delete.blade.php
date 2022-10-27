@csrf


<div id="activate-student-account-details">
  <hr>
  <div class="enrollment-form-field">
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
  <div class="col">
    <div class="col">
      <span style="font-weight: 900; font-size: 18px;">Please choose the reason for the enrolment form's rejection</span>
      <br>
      <br>
      <div class="col" style="padding-left: 1.5rem;">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value=" The enrolment form is full of discrepancies" name="reason1">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The enrolment form is full of discrepancies
          </label>
        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value="The submitted documents are incorrect" name="reason2">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The submitted documents are incorrect
          </label>

        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value=" Data in the document do not match the data in the enrolment form" name="reason3">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Data in the document do not match the data in the enrolment form
          </label>

        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value="The student isn't qualified for the grade he/she applied into" name="reason4">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The student isn't qualified for the "grade" he/she applied into
          </label>

        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value="The student isn't qualified for the strand he/she applied into" name="reason5">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The student isn't qualified for the "strand" he/she applied into
          </label>

        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value=" The school isn't currently accepting student into the requested strand to enrol into" name="reason6">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The school isn't currently accepting student into the requested "strand" to enrol into
          </label>

        </div>
        <div class="form-check">

          <input class="form-check-input" type="checkbox" value="The school isn't currently accepting student into the requested grade to enrol into" name="reason7">
          <label class="form-check-label" for="flexCheckIndeterminate">
            The school isn't currently accepting student into the requested "grade" to enrol into
          </label>
        </div>
      </div>
    </div>
    <br>
    <div class="col">
      <span style="font-weight: 900; font-size: 18px;">For any rejection specifications, type them here:</span>
      <div class="form-group">
        <label for="comment">Message:</label>
        <textarea class="form-control" rows="5" id="comment" name="specification"></textarea>
      </div>
    </div>
  </div>

    <hr>
    <div class="col" style="padding-left: 1.5rem;">

        <div class="form-check">

          <input class="form-check-input" type="checkbox" checked value="true" name="attach">
          <label class="form-check-label" for="flexCheckIndeterminate">
             <span style="font-weight: 900; font-size: 18px;">Attach an update form to the email</span>
          </label>
        </div>
    </div>
  <hr>


        
  <div class="enrollment-form-field">
    <button type="submit" class="btn btn-danger" style="font-size: 14px;">Reject</button>
    <a style="font-size: 14px;" class="btn btn-success" href="{{route('admin.users.show',$user->id) }}" role="button">View Enrolment Form</a>
    <a style="font-size: 14px;" class="btn btn-warning" href="{{route('admin.users.index',$user->id) }}" role="button">Back</a>
  </div>
</div>