@csrf
<div id="enrollment-form">
  <div id="enrollform-base">
    <center id="form-top-header">
      <img src={{URL::asset('logo.png')}} alt="Logo" id="form-school-logo">
      <span id="school-name">Basista National High School</span>
      <span id="school-location">Basista, Pangasinan</span>
      <span id="acadyear">Academic Year 2022 - 2023</span>
    </center>
    <br>
    <hr>
    <div class="form-info-header">
      <span>Grade level and School Information</span>
    </div>
    <div class="enrollment-form-field">
      <div class="form-field">
        <label for="gradeleveltoenrolin">Grade Level to Enrol In</label>
        <input type="text" name="gradeleveltoenrolin" id="gradeleveltoenrolin" value="{{$user->gradeleveltoenrolin}}" readonly>
      </div>
      <div class="form-field">
        <label for="strandtoenrolin">Strand to Enrol In</label>
        <input type="text" name="strandtoenrolin" id="strandtoenrolin" value="{{$user->strandtoenrolin}}" readonly>
      </div>
      <div class="form-field">
        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester" value="{{$user->semester}}" readonly>
      </div>
    </div>
    <div class="enrollment-form-field">
      <div class="form-field">
        <label for="studenttype">Student Type</label>
        <input type="text" name="studenttype" value="{{$user->studenttype}}" readonly>
      </div>
      <div class="form-field">
        <label for="indegenouscommunity">Part of Indegenous Community</label>
        <input type="text" name="indegenouscommunity" value="{{$user->indegenouscommunity}}" readonly>
      </div>
      <div class="form-field">
        <label for="indigency">4ps Member ID</label>
        <input type="text" name="indigency" id="indigency" value="{{$user->indigency}}" readonly>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Student Information</span>
    </div>
    <div class="enrollment-form-field">
      <div class="form-field">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" value="{{$user->name}}" readonly>
      </div>
      <div class="form-field">
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" id="middlename" value="{{$user->middlename}}" readonly>
      </div>
      <div class="form-field">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" readonly>
      </div>
    </div>
    <div class="form-info-header">
      <span>Current Address</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="currenthousenumber">House Number</label>
        <input type="text" name="currenthousenumber" id="currenthousenumber" value="{{$user->currenthousenumber}}" readonly>
      </div>
      <div class="form-field">
        <label for="currentbaranggay">Baranggay</label>
        <input type="text" name="currentbaranggay" id="currentbaranggay" value="{{$user->currentbaranggay}}" readonly>
      </div>
      <div class="form-field">
        <label for="currentmunicipality">Municipality</label>
        <input type="text" name="currentmunicipality" id="currentmunicipality" value="{{$user->currentmunicipality}}" readonly>
      </div>
      <div class="form-field">
        <label for="currentprovince">Province</label>
        <input type="text" name="currentprovince" id="currentprovince" value="{{$user->currentprovince}}" readonly>
      </div>
    </div>

    <div class="form-info-header">
      <span>Permanent Address</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: auto 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="permanenthousenumber">House Number</label>
        <input type="text" name="permanenthousenumber" id="permanenthousenumber" value="{{$user->permanenthousenumber}}" readonly>
      </div>
      <div class="form-field">
        <label for="permanentbaranggay">Baranggay</label>
        <input type="text" name="permanentbaranggay" id="permanentbaranggay" value="{{$user->permanentbaranggay}}" readonly>
      </div>
      <div class="form-field">
        <label for="permanentmunicipality">Municipality</label>
        <input type="text" name="permanentmunicipality" id="permanentmunicipality" value="{{$user->permanentmunicipality}}" readonly>
      </div>
      <div class="form-field">
        <label for="permanentprovince">Province</label>
        <input type="text" name="permanentprovince" id="permanentprovince" value="{{$user->permanentprovince}}" readonly>
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 2.5fr 1.5fr auto 3rem 1fr;">
      <div class="form-field">
        <label for="email">Email address</label>
        <input type="text" name="email" id="email" value="{{$user->email}}" readonly>
      </div>
      <div class="form-field">
        <label for="phonenumber">Phone Number</label>
        <input type="text" name="phonenumber" id="phonenumber" value="{{$user->phonenumber}}" readonly>
      </div>
      <div class="form-field">
        <label for="birthday">Birthday</label>
        <input type="text" name="birthday" id="birthday" value="{{$user->birthday}}" readonly>
      </div>
      <div class="form-field">
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="{{$user->age}}" readonly>
      </div>
      <div class="form-field">
        <label for="sex">Sex</label>
        <input type="text" name="sex" value="{{$user->sex}}" readonly>
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr;">
      <div class="form-field">
        <label for="mothertongue">Mother Tongue</label>
        <input type="text" name="mothertongue" value="{{$user->mothertongue}}" readonly>
      </div>
      <div class="form-field">
        <label for="religion">Religion</label>
        <input type="text" name="religion" value="{{$user->religion}}" readonly>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Enrolment Information</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1.5fr;">
      <div class="form-field">
        <label for="generalaverage">General Weighted Average (GWA)</label>
        <input type="text" name="generalaverage" value="{{$user->generalaverage}}" readonly>
      </div>
      <div class="form-field">
        <label for="lrnnumber">Learner's Reference Number(LRN)</label>
        <input type="text" name="lrnnumber" value="{{$user->lrnnumber}}" readonly>
      </div>
      <div class="form-field">
        <label for="psanumber">PSA Birth Certificate Number</label>
        <input type="text" name="psanumber" value="{{$user->psanumber}}" readonly>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Parent's/Guardian's Information</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="fatherfirstname">Father's First Name</label>
        <input type="text" name="fatherfirstname" value="{{$user->fatherfirstname}}" readonly>
      </div>
      <div class="form-field">
        <label for="fathermiddlename">Father's Middle Name</label>
        <input type="text" name="fathermiddlename" value="{{$user->fathermiddlename}}" readonly>
      </div>
      <div class="form-field">
        <label for="fatherlastname">Father's Last Name</label>
        <input type="text" name="fatherlastname" value="{{$user->fatherlastname}}" readonly>
      </div>
      <div class="form-field">
        <label for="fatherphonenumber">Father's Phone Number</label>
        <input type="text" name="fatherphonenumber" value="{{$user->fatherphonenumber}}" readonly>
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="motherfirstname">Mother's First Name</label>
        <input type="text" name="motherfirstname" value="{{$user->motherfirstname}}" readonly>
      </div>
      <div class="form-field">
        <label for="mothermiddlename">Mother's Middle Name</label>
        <input type="text" name="mothermiddlename" value="{{$user->mothermiddlename}}" readonly>
      </div>
      <div class="form-field">
        <label for="motherlastname">Mother's Last Name</label>
        <input type="text" name="motherlastname" value="{{$user->motherlastname}}" readonly>
      </div>
      <div class="form-field">
        <label for="motherphonenumber">Mother's Phone Number</label>
        <input type="text" name="motherphonenumber" value="{{$user->motherphonenumber}}" readonly>
      </div>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="guardianfirstname">Guardian's First Name</label>
        <input type="text" name="guardianfirstname" value="{{$user->guardianfirstname}}" readonly>
      </div>
      <div class="form-field">
        <label for="guardianmiddlename">Guardian's Middle Name</label>
        <input type="text" name="guardianmiddlename" value="{{$user->guardianmiddlename}}" readonly>
      </div>
      <div class="form-field">
        <label for="guardianlastname">Guardian's Last Name</label>
        <input type="text" name="guardianlastname" value="{{$user->guardianlastname}}" readonly>
      </div>
      <div class="form-field">
        <label for="guardianphonenumber">Guardian's Phone Number</label>
        <input type="text" name="guardianphonenumber" value="{{$user->guardianphonenumber}}" readonly>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>Preferred Distance Learning Modalyties</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 1 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Print)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 2 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Modular(Digital)
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 3 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Online
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 4 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Educational Television
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 5 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Radio-Based Instruction
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 6 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Homeschooling
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 7 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Blended
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="modality[]" id="modality" {{$user->modalities[0]['pivot']['modality_id'] == 8 ? 'checked' : ''}}>
              <label class="form-check-label" for="flexRadioDefault1">
                Face-to-Face
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-info-header">
      <span>For Returning Learner(Balik-Aral) and Those Who Will Transfer/Move In</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="lastgradelevelcompleted">Last Grade Level Completed</label>
        <input type="text" name="lastgradelevelcompleted" id="lastgradelevelcompleted" value="{{$user->lastgradelevelcompleted}}" readonly>
      </div>
      <div class="form-field">
        <label for="lastschoolyearattended">Last School Year Completed</label>
        <input type="text" name="lastschoolyearattended" id="lastschoolyearattended" value="{{$user->lastschoolyearattended}}" readonly>
      </div>
      <div class="form-field">
        <label for="lastschoolattended">Last School Attended</label>
        <input type="text" name="lastschoolattended" id="lastschoolattended" value="{{$user->lastschoolattended}}" readonly>
      </div>
      <div class="form-field">
        <label for="schoolid">School ID</label>
        <input type="text" name="schoolid" id="schoolid" value="{{$user->schoolid}}" readonly>
      </div>
    </div>
    <hr>

    <div class="enrollment-form-field">
      <a style="font-size: 14px;" class="btn btn-success" href="{{route('admin.users.edit',$user->id) }}" role="button">Accept</a>
      <a style="font-size: 14px;" class="btn btn-danger" href="{{url('admin/reason',$user->id) }}" role="button">Reject</a>
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>
</div>