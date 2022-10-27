@extends('template.main')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <h1>Enrolment Application Form</h1>
<div class="card">

<form method = "POST" action="{{route('register')}}">

  @csrf

  <div class="row">
      <h5>Grade Level and School Information</h5>


  <div class="col">
    <label for="lastschoolyearattended" class="form-label">Last School Year Completed</label>
    <input name ="lastschoolyearattended" type="text" class="form-control @error('lastschoolyearattended') is-invalid |@enderror" id="lastschoolyearattended" aria-describedby="lastschoolyearattended" value= "{{old('lastschoolyearattended')}}"required  >
    @error('lastschoolyearattended')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="lastschoolattended" class="form-label">Last School Attended</label>
    <input name ="lastschoolattended" type="text" class="form-control @error('lastschoolattended') is-invalid |@enderror" id="lastschoolattended" aria-describedby="lastschoolattended" value= "{{old('lastschoolattended')}}" required  >
    @error('lastschoolattended')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
    

    <div class="col">
    <label for="addressofthelastschoolattended" class="form-label">School Address</label>
    <input name ="addressofthelastschoolattended" type="text" class="form-control @error('addressofthelastschoolattended') is-invalid |@enderror" id="addressofthelastschoolattended" aria-describedby="AddressLastSchool" value= "{{old('addressofthelastschoolattended')}}" required >
    @error('addressofthelastschoolattended')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

   

  </div>
  <div class="row">
    <div class="col-4 ">

  <label for="lastgradelevelcompleted" class="form-label">Last Grade Level Completed</label>
  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lastgradelevelcompleted" id="lastgradelevelcompleted" onClick="return update()" >
  <option data = "Grade 7" value="Grade 7">Grade 7</option>
  <option data = "Grade 8"value="Grade 8">Grade 8</option>
  <option data = "Grade 9" value="Grade 9">Grade 9</option>
   <option data = "Grade 10" value="Grade 10">Grade 10</option>
  <option data = "Grade 11" value="Grade 11">Grade 11</option>
  <option data = "Grade 12" value="Grade 12">Grade 12</option>
</select>

  </div>

  <div class="col" id="laststrandattended" style="display: none;">

  <label for="laststrandattended" class="form-label">Last Strand Attended</label>
  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="laststrandattended" id ="laststrandattended2"  onChange="return updateStrand()" >
<option data2 = "Not Applicable" value="Not Applicable">Not Applicable</option>
 <option data2 = "HUMMS" value="HUMMS">HUMMS</option>
  <option data2 = "GAS" value="GAS">GAS</option>
  <option data2 = "TVL" value="TVL">TVL</option>
   <option data2 = "COOKERY" value="COOKERY">COOKERY</option>
  <option data2 = "ICT" value="ICT">ICT</option>
  <option data2 = "ABM" value="ABM">ABM</option>
   <option data2 = "STEM" value="STEM">STEM</option>
</select>

  </div>
       <div class = col>   
    <label>School Type</label>

  <div class="form-check  @error('schooltype') is-invalid |@enderror">
  <input class="form-check-input" type="radio" name="schooltype" id="schooltype" value="Public"  {{ old('schooltype') ? 'checked' : ''}} >
  <label class="form-check-label" for="flexRadioDefault1">
    Public
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="schooltype" id="schooltype" value="Private"  {{ old('schooltype') ? 'checked' : ''}} >
  <label class="form-check-label" for="flexRadioDefault1">
    Private
  </label>
  </div>

    @error('schooltype')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  </div>
<div class="row">
  

  <div class="col-4">


 <div class="col">
    <label for="gradeleveltoenrolin" class="form-label">Grade Level to Enrol In</label>
    <input name ="gradeleveltoenrolin" type="text" class="form-control @error('gradeleveltoenrolin') is-invalid |@enderror" id="gradeleveltoenrolin" aria-describedby="gradeleveltoenrolin" value= "{{old('gradeleveltoenrolin')}}"  required readonly>
    @error('gradeleveltoenrolin')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

</div>


 <div class="col-4" id="strandtoenrolin" style='display:none;'>

 
  <label for="strandtoenrolin" class="form-label">Last Strand Attended</label>
  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="strandtoenrolin" id ="strandtoenrolin"   >
<option value="Not Applicable">Not Applicable</option>
 <option  value="HUMMS">HUMMS</option>
  <option value="GAS">GAS</option>
  <option value="TVL">TVL</option>
   <option value="COOKERY">COOKERY</option>
  <option  value="ICT">ICT</option>
  <option  value="ABM">ABM</option>
   <option value="STEM">STEM</option>
</select>

</div>
    <div class = col-4>
<label>Are you returning student?(Balik aral)</label>
   

  <div class="form-check  @error('returningstudent') is-invalid |@enderror">
  <input class="form-check-input" type="radio" name="returningstudent" id="returningstudent" value="Yes"  {{ old('returningstudent') ? 'checked' : ''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="returningstudent" id="returningstudent" value="No"  {{ old('returningstudent') ? 'checked' :''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('returningstudent')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
</div>


  <h5>Student Information</h5>
  
  <div class = "row">
  
  <div class="col">
    <label for="name" class="form-label">First Name</label>
    <input name ="name" type="text" class="form-control @error('name') is-invalid |@enderror" id="name" aria-describedby="name" value= "{{old('name')}}"  required >
    @error('name')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="middlename" class="form-label">Middle Name</label>
    <input name ="middlename" type="text" class="form-control @error('middlename') is-invalid |@enderror" id="middlename" aria-describedby="middlename" value= "{{old('middlename')}}"required  >
    @error('middlename')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="lastname" class="form-label">Last Name</label>
    <input name ="lastname" type="text" class="form-control @error('lastname') is-invalid |@enderror" id="lastname" aria-describedby="lastname" value= "{{old('lastname')}}" required >
    @error('lastname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
<div>


<div class="row">

  <div class="col-2">
    <label for="housenumber" class="form-label">House Number</label>
    <input name="housenumber" type="text" class="form-control @error('housenumber') is-invalid |@enderror" id="housenumber" aria-describedby="HouseNumber"value= "{{old('housenumber')}}" required >
    @error('housenumber')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>


  <div class="col">
    <label for="baranggay" class="form-label">Baranggay</label>
    <input name="baranggay" type="text" class="form-control @error('baranggay') is-invalid |@enderror" id="baranggay" aria-describedby="baranggay"value= "{{old('baranggay')}}" required >
    @error('baranggay')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

   <div class="col">
    <label for="municipality" class="form-label">Municipality</label>
    <input name="municipality" type="text" class="form-control @error('municipality') is-invalid |@enderror" id="municipality" aria-describedby="municipality"value= "{{old('municipality')}}" required >
    @error('municipality')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

  <div class="col">
    <label for="province" class="form-label">Province</label>
    <input name="province" type="text" class="form-control @error('province  ') is-invalid |@enderror" id="province" aria-describedby="province  "value= "{{old('province')}}" required >
    @error('province')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

  </div>


<div class="row">
  <div class="col-3">
    <label for="email" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid |@enderror" id="email" aria-describedby="email"value= "{{$request->email}}" required >
    @error('email')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

   <div class="col-3">
    <label for="phonenumber" class="form-label">Phone Number</label>
    <input name="phonenumber" type="number" class="form-control @error('phonenumber') is-invalid |@enderror" id="phonenumber" aria-describedby="PhoneNumber"value= "{{old('phonenumber')}}" required >
    @error('phonenumber')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

   <div class = col-4>


    <label for="birthday" class="form-label">Birthday</label>
    <input name="birthday" type="text" class="form-control @error('birthday') is-invalid |@enderror" id="birthday" aria-describedby="birthday"value= "{{old('birthday')}}" required >
    @error('birthday')
    <span class ="invalid-feedback" role="alert">
      {{$message}}

    </span>
    @enderror
    </div>

      <div class = col>

    <label for="age" class="form-label">Age</label>
    <input name="age" type = "number" class="form-control @error('age') is-invalid |@enderror" id="age" aria-describedby="age"value= "{{old('age')}}" readonly required >
    @error('age')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
    </div>

    <div class = col>
<label> Sex</label>
   

  <div class="form-check  @error('sex') is-invalid |@enderror">
  <input class="form-check-input" type="radio" name="sex" id="sex" value="Male"  {{ old('sex') ? 'checked' : ''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="sex" id="sex" value="Female"  {{ old('sex') ? 'checked' :''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    Female
  </label>
  </div>

    @error('sex')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  </div>


 

<div class="row">

<div class="col">
   <label for="mothertongue" class="form-label">Mother Tongue</label>
    <input name="mothertongue" type="text" class="form-control @error('mothertongue') is-invalid |@enderror" id="mothertongue" aria-describedby="mothertongue" value= "{{old('mothertongue')}}"required >
    @error('mothertongue')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  
</div>

<div class="col">
   <label for="religion" class="form-label">Religion</label>
    <input name="religion" type="text" class="form-control @error('religion') is-invalid |@enderror" id="religion" aria-describedby="religion" value= "{{old('religion')}}"required >
    @error('religion')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  
</div>

</div>

  <div class =row>
    <h5>Enrolment Documents</h5>

<div class="col-2">
    <label for="generalaverage" class="form-label">General Average</label>
    <input name ="generalaverage" type="number" class="form-control @error('generalaverage') is-invalid |@enderror" id="generalaverage" aria-describedby="generalaverage" value= "{{old('generalaverage')}}"required  >
    @error('generalaverage')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

 <div class = col id="LRNyes" >
 
   
       <label for="lrnnumber" class="form-label">Learner's Reference Number</label>
    <input name ="lrnnumber" type="number" class="form-control @error('lrnnumber') is-invalid |@enderror" id="lrnnumber" aria-describedby="lrnnumber" value= "{{old('lrnnumber')}}" required >
    @error('lrnnumber')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
    </div>
    <div class = col>

<label>Do you have your PSA?</label>
   

  <div class="form-check  @error('psastatus') is-invalid |@enderror">
  <input class="form-check-input " type="radio" name="psastatus" id="psastatus" value="Yes"  onclick="javascript:PSAyesnoCheck()";  {{ old('psastatus') ? 'checked' : ''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="psastatus" id="psastatus" value="No" onclick="javascript:PSAyesnoCheck()"; {{ old('psastatus') ? 'checked' : ''}}>
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('PSA')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
    <div class = col-5 id="PSAyes" style="visibility:hidden">
       <label for="PSAnumber" class="form-label">PSA Birth Certificate no. (If available upon enrolment)</label>
    <input name ="psanumber" type="number" class="form-control @error('psanumber') is-invalid |@enderror" id="psanumber" aria-describedby="psanumber" value= "{{old('psanumber')}}" >
    @error('psanumber')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
    </div>
 

</div>
<div class="row">
    <h5>Parent Information</h5>
     <div class="col">
    <label for="fatherfirstname" class="form-label">Father's First Name</label>
    <input name ="fatherfirstname" type="text" class="form-control @error('fatherfirstname') is-invalid |@enderror" id="fatherfirstname" aria-describedby="fatherfirstname" value= "{{old('fatherfirstname')}}" required >
    @error('fatherfirstname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
 FatherMiddleName
    @enderror
  </div>

    <div class="col">
    <label for="fathermiddlename" class="form-label">Father's Middle Name</label>
    <input name ="fathermiddlename" type="text" class="form-control @error('fathermiddlename') is-invalid |@enderror" id="fathermiddlename" aria-describedby="FatherMiddleName" value= "{{old('fathermiddlename')}}"required  >
    @error('fathermiddlename')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="fatherlastname" class="form-label">Father's Last Name</label>
    <input name ="fatherlastname" type="text" class="form-control @error('fatherlastname') is-invalid |@enderror" id="fatherlastname" aria-describedby="fatherlastname" value= "{{old('fatherlastname')}}" >
    @error('fatherlastname')
    <span class ="invalid-feedback" role="alert"required >
      {{$message}}
    </span>
    @enderror
  </div>
  
</div>

<div class="row">
  
     <div class="col">
    <label for="motherfirstname" class="form-label">Mother's First Name</label>
    <input name ="motherfirstname" type="text" class="form-control @error('motherfirstname') is-invalid |@enderror" id="motherfirstname" aria-describedby="motherfirstname" value= "{{old('motherfirstname')}}" required >
    @error('motherfirstname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="mothermiddlename" class="form-label">Mother's Middle Name</label>
    <input name ="mothermiddlename" type="text" class="form-control @error('mothermiddlename') is-invalid |@enderror" id="mothermiddlename" aria-describedby="mothermiddlename" value= "{{old('mothermiddlename')}}" required  >
    @error('mothermiddlename')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="motherlastname" class="form-label">Mother's Last Name</label>
    <input name ="motherlastname" type="text" class="form-control @error('motherlastname') is-invalid |@enderror" id="motherlastname" aria-describedby="motherlastname" value= "{{old('motherlastname')}}" required >
    @error('motherlastname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  
</div>

<div class="row">
    <h5>Guardian Information</h5>

    <div class="col">
    <label for="guardianfirstname" class="form-label">Guardian's First Name</label>
    <input name ="guardianfirstname" type="text" class="form-control @error('guardianfirstname') is-invalid |@enderror" id="guardianfirstname" aria-describedby="guardianfirstname" value= "{{old('guardianfirstname')}}" required  >
    @error('guardianfirstname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="guardianmiddlename" class="form-label">Guardian's Middle Name</label>
    <input name ="guardianmiddlename" type="text" class="form-control @error('guardianmiddlename') is-invalid |@enderror" id="guardianmiddlename" aria-describedby="guardianmiddlename" value= "{{old('guardianmiddlename')}}"required  >
    @error('guardianmiddlename')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

    <div class="col">
    <label for="guardianlastname" class="form-label">Guardian's Last Name</label>
    <input name ="guardianlastname" type="text" class="form-control @error('guardianlastname') is-invalid |@enderror" id="guardianlastname" aria-describedby="guardianlastname" value= "{{old('guardianlastname')}}" required >
    @error('guardianlastname')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>
  
</div>
<div class="row">
  <h5>Guardian's Contact Information</h5>

    <div class="col">
    <label for="guardianrelationship" class="form-label">Guardian's Relationship to the enrollee</label>
    <input name="guardianrelationship" type="text" class="form-control @error('guardianrelationship') is-invalid |@enderror" id="guardianrelationship" aria-describedby="guardianrelationship"value= "{{old('guardianrelationship')}}" required >
    @error('guardianrelationship')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

  <div class="col">
    <label for="guardianemail" class="form-label">Guardian's Email address</label>
    <input name="guardianemail" type="email" class="form-control @error('guardianemail') is-invalid |@enderror" id="guardianemail" aria-describedby="guardianemail"value= "{{old('guardianemail')}}">
    @error('guardianemail')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

   <div class="col">
    <label for="guardianphonenumber" class="form-label">Guardian's Phone Number</label>
    <input name="guardianphonenumber" type="number" class="form-control @error('guardianphonenumber') is-invalid |@enderror" id="guardianphonenumber" aria-describedby="guardianphonenumber"value= "{{old('guardianphonenumber')}}" required >
    @error('guardianphonenumber')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror
  </div>

  </div>

 
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
   </div>

@endsection

