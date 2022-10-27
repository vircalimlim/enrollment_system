@extends('template.main')

@section('content')

<div class="card">

<form method = "POST" action="{{route('student.survey.store')}}">

  @csrf
 <div class="row">
  <h5>Student Information</h5>
        <div class = col>
<label> Are you part of an indigenous community?</label>
  
<input type="hidden" name="id" value="{{$user->id}}">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="indegenouscommunityradio" id="yesCheck1" value="Yes"  onclick="javascript:yesnoCheck1();">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="indegenouscommunityradio" id="noCheck1" value="No"  onclick="javascript:yesnoCheck1();">
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('indegenouscommunity')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror


  </div>


  <div class="col" id = "ifYes1" style = "visibility:hidden">
    <label for="indegenouscommunity" class="form-label">Please specifiy the indegenous group you belong to</label>
    <input name="indegenouscommunity" type="text" class="form-control @error('IndegenousCommunitySpecification') is-invalid |@enderror" id="IndegenousCommunitySpecification" aria-describedby="indegenouscommunity"value= "{{old('indegenouscommunity')}}">
    @error('indegenouscommunity')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror

  </div>

  </div>

<div class ="row">

<div class = col-6>
<label> Does the learner have special education needs?(i.e physical,mental,social disability,medical condition,giftedness,among others)</label>
   

  <div class="form-check">
  <input class="form-check-input" type="radio" name="specialneeds" id="yesCheck" value="Yes"  onclick="javascript:yesnoCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="specialneeds" id="noCheck" value="No"  onclick="javascript:yesnoCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('SpecialNeeds')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror


  </div>
      

<div class="col-6" id = "ifYes2" style = "visibility:hidden">
   <label for="assistivedevices" class="form-label">Do you have any assistive technology devices available at home?</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="assistivedevices" id="yesCheck2" value="Yes"  onclick="javascript:yesnoCheck2();">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="assistivedevices" id="noCheck2" value="No"  onclick="javascript:yesnoCheck2();">
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('assistivedevices')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror

  </div>



</div>

<div class="row">
<div class="col-6" id = "ifYes" style = "display:none;">

    <label>Please specify the learner's special needs</label>
    <div class="row">
<div class="col">
   <div class="form-check">

  <input class="form-check-input" type="checkbox" value="1" name="dyslexia" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Dyslexia
  </label>

  </div>
   <div class="form-check">

  <input class="form-check-input" type="checkbox" value="2" name="dyscalculia" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Dyscalculia
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="3" name="writtenexpressiondisorder" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Written expression disorder
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="4" name="adhd" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  ADHD
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="5" name="autisimspectrumdisorder" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Autism Spectrum Disorder
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="6" name="emotionaldisturbance" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Emotional Disturbance
  </label>

  </div>

  </div>
<div class="col">

    <div class="form-check">

  <input class="form-check-input" type="checkbox" value="7" name="speechorlanguageimpairment" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Speech or language impairment
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="8" name="deafblindness"  id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Deaf-blindess
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="9" name="orthopedicimpairment" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Orthopedic impairment
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="10" name="traumaticbraininjury" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Traumatic Brain Injury
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="11" name="miltipledisabilities" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Multiple Disabilities
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="12" name="others" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Others
  </label>

  </div>
  </div>


  </div>


  </div>

<div class="col-6" id = "ifYes3" style = "display:none;">

    <label>Please specify the assistive technology you have at home</label>
    <div class="row">
<div class="col">
   <div class="form-check">

  <input class="form-check-input" type="checkbox" value="1" name="mobilityaids" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Mobility Aids(wheel chair, cane, etc.)
  </label>

  </div>
   <div class="form-check">

  <input class="form-check-input" type="checkbox" value="2" name="hearingaids" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Hearing Aid
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="3" name="cognitiveaids" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Cognitive Aids(computer or electrical assistive devices to help people with memory, attention, or other challenges in their thinking skill)
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="4" name="voicerecognition" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Voice recognition programs
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="5" name="physicalmodifications" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Physical modifications in the built environment
  </label>

  </div>
 
  </div>
<div class="col">

     <div class="form-check">

  <input class="form-check-input" type="checkbox" value="6" name="lightweight" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
 Lightweight, high-performance mobility devices.
  </label>

  </div>


  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="7" name="adaptive" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
  Adaptive switches and utensils
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="8" name="devices" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
 Devices and features of devices to help perform tasks
  </label>

  </div>

  <div class="form-check">

  <input class="form-check-input" type="checkbox" value="9" name="tools" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
   "Tools(i.e.automatic page turners, book holders,adapted pencil grips)
  </label>

  </div>

    <div class="form-check">

  <input class="form-check-input" type="checkbox" value="10" name="assistiveothers" id="SpecialNeedsSpecification">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Others
  </label>

  </div>

 
  </div>


  </div>


  </div>


  </div>

<div class = row>
	
 <h5>Parent/Guardian Information</h5>

   <div class="col">
  <label>Father's Highest Educational Attainment</label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value ="No Formal Schooling" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value="No Formal Schooling but able to read and write" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling but able to read and write
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value="Elementary Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Level
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value="Elementary Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Graduate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value="High School Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Level
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value="High School Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Gradudate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="fathereducation" value=" After High School Education(College/Post Grad) or Technical/Vocational" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    After High School Education(College/Post Grad) or Technical/Vocational
  </label>
</div>

  </div>



   <div class="col">
  <label>Mother's Highest Educational Attainment</label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value ="No Formal Schooling" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value="No Formal Schooling but able to read and write" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling but able to read and write
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value="Elementary Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Level
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value="Elementary Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Graduate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value="High School Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Level
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value="High School Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Gradudate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="mothereducation" value=" After High School Education(College/Post Grad) or Technical/Vocational" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    After High School Education(College/Post Grad) or Technical/Vocational
  </label>
</div>

  </div>
   <div class="col">
  <label>Guardian's Highest Educational Attainment</label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value ="No Formal Schooling" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value="No Formal Schooling but able to read and write" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    No Formal Schooling but able to read and write
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value="Elementary Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Level
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianreducation" value="Elementary Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elementary Graduate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value="High School Level" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Level
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value="High School Graduate" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    High School Gradudate
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="guardianeducation" value=" After High School Education(College/Post Grad) or Technical/Vocational" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    After High School Education(College/Post Grad) or Technical/Vocational
  </label>
</div>

  </div>



  <div class="row">

 <h5>Household Capacity and Access to Distance Learning</h5>
  	<div class="col">
 <label class="form-check-inline">Is your family a benificiary of 4Ps?</label>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="indigency" id="inlineRadio1" value="Yes">
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="indigency" id="inlineRadio2" value="No">
  <label class="form-check-label" for="inlineRadio2">No</label>
</div>
 </div>

</div>
<div class="row">
	  <label>How many of your household members(including the enrollee) are studying in this schoolyear? Please Specify Each</label>
 <div class="col-6">

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="col-md-4"></th>
      <th class="col-md-4">Number of Sibling Enrolled</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="name in getdrugnameNewArray">

      <td>Kinder</td>
      <td><input name="kindersibling" type="number" class="form-control @error('kindersibling') is-invalid |@enderror" id="kindersibling" aria-describedby="kindersibling"value= "{{old('kindersibling')}}" required >
    @error('kindersibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>


    </tr>

        <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 1</td>
      <td><input name="grade1sibling" type="number" class="form-control @error('grade1sibling') is-invalid |@enderror" id="grade1sibling" aria-describedby="grade1sibling"value= "{{old('grade1sibling')}}" required >
    @error('grade1sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade  2</td>
      <td><input name="grade2sibling" type="number" class="form-control @error('grade2sibling') is-invalid |@enderror" id="grade2sibling" aria-describedby="grade2sibling"value= "{{old('grade2sibling')}}" required >
    @error('grade2sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 3</td>
      <td><input name="grade3sibling" type="number" class="form-control @error('grade3sibling') is-invalid |@enderror" id="grade3sibling" aria-describedby="grade3sibling"value= "{{old('grade3sibling')}}" required >
    @error('grade3sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

           

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 4</td>
      <td><input name="grade4sibling" type="number" class="form-control @error('grade4sibling') is-invalid |@enderror" id="grade4sibling" aria-describedby="grade4sibling"value= "{{old('grade4sibling')}}" required >
    @error('grade4sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 5</td>
      <td><input name="grade5sibling" type="number" class="form-control @error('grade5sibling') is-invalid |@enderror" id="grade5sibling" aria-describedby="grade5sibling"value= "{{old('grade5sibling')}}" required >
    @error('grade5sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 6</td>
      <td><input name="grade6sibling" type="number" class="form-control @error('grade6sibling') is-invalid |@enderror" id="grade6sibling" aria-describedby="grade6sibling"value= "{{old('grade6sibling')}}" required >
    @error('grade6sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

      

  </tbody>
</table>

</div>
<div class="col">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="col-md-4"></th>
      <th class="col-md-4">Number of Sibling Enrolled</th>
    </tr>
  </thead>
  <tbody>
  	 <tr ng-repeat="name in getdrugnameNewArray">

      <td>Grade 7</td>
      <td><input name="grade7sibling" type="number" class="form-control @error('grade7sibling') is-invalid |@enderror" id="grade7sibling" aria-describedby="grade7sibling"value= "{{old('grade7sibling')}}" required >
    @error('grade7sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>


    </tr>
    <tr ng-repeat="name in getdrugnameNewArray">

      <td>Grade 8</td>
      <td><input name="grade8sibling" type="number" class="form-control @error('grade8sibling') is-invalid |@enderror" id="grade8sibling" aria-describedby="grade8sibling"value= "{{old('grade8sibling')}}" required >
    @error('grade8sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>


    </tr>

        <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 9</td>
      <td><input name="grade9sibling" type="number" class="form-control @error('grade9sibling') is-invalid |@enderror" id="grade9sibling" aria-describedby="grade9sibling"value= "{{old('grade9sibling')}}" required >
    @error('grade9sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade  10</td>
      <td><input name="grade10sibling" type="number" class="form-control @error('grade10sibling') is-invalid |@enderror" id="grade10sibling" aria-describedby="grade10sibling"value= "{{old('grade10sibling')}}" required>
    @error('grade10sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

       <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 11</td>
      <td><input name="grade11sibling" type="number" class="form-control @error('grade11sibling') is-invalid |@enderror" id="grade11sibling" aria-describedby="grade11sibling"value= "{{old('grade11sibling')}}" required >
    @error('grade11sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

           <tr ng-repeat="name in getdrugnameNewArray">
      <td>Grade 12</td>
      <td><input name="grade12sibling" type="number" class="form-control @error('grade12sibling') is-invalid |@enderror" id="grade12sibling" aria-describedby="grade12sibling"value= "{{old('grade12sibling')}}" required >
    @error('grade12sibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

      
       <tr ng-repeat="name in getdrugnameNewArray">
      <td>College/Post Grad/Technical/Vocational</td>
      <td><input name="othersibling" type="number" class="form-control @error('othersibling') is-invalid |@enderror" id="othersibling" aria-describedby="othersibling"value= "{{old('othersibling')}}" required >
    @error('othersibling')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror</td>
    </tr>

  </tbody>
</table>
</div>
  </div>
</div>
<div class="row">	
  <div class="col">
  <label>Who among the household members can provide instructional support to the child's distance learning?</label>
  <div class="row">	
  	 <div class="col">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="parents/guardians" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Parents/Guardians
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" name="eldersiblings" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Elder Siblings
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" name="grandparents" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Grandparents
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" value="4" name="extendedmembersofthefamily" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Extended members of the family
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="5" name="others" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Others(Tutor,House Helper)
  </label>
</div>
</div>
<div class="col">
	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="6" name="none" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    None
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="7" name="independent" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Able to do independent learning
  </label>
</div>
</div>
 </div>
  </div>

 <div class="col">
  <label>What devices are available at home that the learner can use for learning?</label>
  <div class="row">
  <div class="col">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="cabletv" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Cable TV
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" name="non-cabletv" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Non-Cable TV
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" name="basiccellphone" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Basic Cellphhone
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" value="4" name="smartphone" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Smartphone
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="5" name="tablet" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Tablet
  </label>
</div>

</div>



<div class="col">

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="6" name="radio" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Radio
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="7" name="desktopcomputer" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Desktop Computer
  </label>
</div>
<div class="col">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="8" name="laptop" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Laptop
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="9" name="nonedevice" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    None
  </label>
</div>
</div>
  </div>
  </div>
</div>



<div class="row">
       <div class = col>
<label> Is there an internet connection in your area?</label>
   

    <div class="form-check">
  <input class="form-check-input" type="radio" name="internetconnection" id="yesInternet" value="Yes"  onclick="javascript:InternetCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
  </div>


    <div class="form-check">
  <input class="form-check-input" type="radio" name="internetconnection" id="noInternet" value="No"  onclick="javascript:InternetCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
    No
  </label>
  </div>

    @error('internetconnection')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror


  </div>
<div class="col" id= "internet" style="visibility:hidden;">

  <label>How  do you connect to the internet?</label>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="ownmobiledata">
  <label class="form-check-label" for="flexRadioDefault1">
    Own Mobile Data
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" name="brodbandinternet">
  <label class="form-check-label" for="flexRadioDefault1">
   Own Broadband Internet(DSL,Wireless Fiber, Satellite)
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" name="connectothers" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  I connect to other's WiFi/Mobile Data
  </label>
</div>

</div>

<div class="col">

  <label>Choose all that applies</label>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="onlinelearning " id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Online Learning
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" name="television" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Television
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" name="radiomodality" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Radio
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="4" name="modular" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Modular Learning
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="5" name="combination" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Combination
  </label>
</div>
</div>

<div class="row">
  <h5>Limited Face to Face</h5>

  <div class="col-4">
    <label>If face to face classes will be allowed, are you willing to allow your child/children to participate?</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="f2fparticipate" value="Yes" id="f2fyes"onclick="javascript:ConsiderationCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
  Yes
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="f2fparticipate" value="No" id="f2fno" onclick="javascript:ConsiderationCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
  No
  </label>
</div>
</div>

<div class="col" id="consideration" style="visibility: hidden;">
  <div class="row">

    <label>Please select one major consideration or state specific reason</label>
<div class="col">
<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Fear of getting infected of Corona Virus" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Fear of getting infected of Corona Virus
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Helping in family business or working" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Helping in family business or working
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Limited or no available transportation" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Limited or no available transportation
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Existing illness or health related concerns" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Existing illness or health related concerns
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Helping in household chores"id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Helping in household chores
  </label>
</div>
</div>

<div class="col">
<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value="Helping in family business or working" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Helping in family business or working
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" value=" Prescence of arm conflict in the area" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Prescence of arm conflict in the area
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="consideration" id="others" onclick="javascript:SpecifyCheck();">
  <label class="form-check-label" for="flexRadioDefault1">
  Others
  </label>
</div>

  <div class="col" id = "specify" style="visibility:hidden;">
    <label for="considerationspecification" class="form-label">Please specify</label>
    <input name="considerationspecification" type="text" class="form-control @error('considerationspecification') is-invalid |@enderror" id="considerationspecification" aria-describedby=considerationspecification value= "{{old('considerationspecification')}}">
    @error('considerationspecification')
    <span class ="invalid-feedback" role="alert">
      {{$message}}
    </span>
    @enderror

  </div>
</div>


</div>
  </div>
</div>
</div>
<div class="row">


  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  I hereby certify that the above information given are true and correct to the best of my knowledge and I allow the Department of Education to use my child's details to create and/or update hise/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012
  </label>
</div>
</div>


</div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>


@endsection