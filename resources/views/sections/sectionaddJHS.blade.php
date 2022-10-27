@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">
@php

$gradename = DB::table('grades')->where('id',$grade)->first();


@endphp 


    <span id="enrollment-applications-container-base-header">Create a Section in {{$gradename->name}} <small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>



<script >
  $( document ).ready(function() {
$('input[id^="tag"]').on('click', function() {  
    alert(this.value);
});
});



</script>

      <form method="POST" action=" {{route('faculty.sections.store') }}">
  
              @csrf
    <div class="container-fluid p-0 m-0">
<input type="hidden" name="grade" value="{{$gradename->name}} ">
<input type="hidden" name="strand" value="Not Applicable">

    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="section_number">Section Number</label>
        <input placeholder="Section Number" name="section_number" type="number" class="@error('section_number') is-invalid |@enderror" id="guardianfirstname" aria-describedby="section_number" value="{{old('section_number')}}" required>
        @error('section_number')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>
    <div class="form-field">
        <label for="lower_gwa">Lower Grade Limit</label>
        <input placeholder="##" name="lower_gwa" type="number" class="@error('lowergrade_limit') is-invalid |@enderror" id="lower_gwa" aria-describedby="lower_gwa" value="{{old('lower_gwa')}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="75" max="99" onchange="
        if (this.value < 75 || this.value > 99) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('lower_gwa')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Average
        </span>
      </div>
         <div class="form-field">
        <label for="upper_gwa">Upper Grade Limit</label>
        <input placeholder="##" name="upper_gwa" type="number" class="@error('uppergrade_limit') is-invalid |@enderror" id="uppergrade_limit" aria-describedby="upper_gwa" value="{{old('upper_gwa')}}" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); " min="75" max="99" onchange="
        if (this.value < 75 || this.value > 99) { 
          this.style.borderColor = 'red'; 
          document.getElementById('ga-alert').style.display = 'block' 
          }
          else { 
            this.style.borderColor = '#d9d9d9'; 
            document.getElementById('ga-alert').style.display = 'none' 
            } 
        " required>
        @error('upper_gwa')
        <span id="ga-alert" class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
        <span style="display: none;" id="ga-alert" class="invalid-feedback" role="alert">
          Invalid Average
        </span>
      </div>


 <div class="form-field">
       <label for="adviser">Adviser</label>
<select  class="form-select form-select-sm "  aria-label="Default select example" name="adviser"> 
@foreach ($teachers as $teacher)

 @php

$teacherdatas  = DB::table('teachers')->where('id',$teacher->id)->first(); 

@endphp

  <option 


 

  selected value="{{$teacherdatas->id}}">{{$teacherdatas->firstname}} {{$teacherdatas->lastname}}</option>


@endforeach
        </select>
  </div>
    </div> 
        <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Assigned Teacher</th>
            <th scope="col">Check Teacher's Schedule</th>
            <th scope="col">Schedule</th>
 
          </tr>
        </thead>
        <tbody>



@foreach($subjects as $subject)

@php
$row =$loop->iteration;
$gradelevels = DB::table('grades_subjects')->where('subjects_id',$subject->subjects_id)->get();    

@endphp





 <tr>

  <td>

 @php
$subjectdata  = DB::table('subjects')->where('id',$subject->subjects_id)->first();  
@endphp

{{$subjectdata->name}}

</td>   

 @php
$teachers  = DB::table('subjects_teachers')->where('subjects_id',$subjectdata->id)->get(); 
@endphp
  
<td>
 <div class="form-field">
<select  class="form-select form-select-sm "  aria-label="Default select example" name="subject_teachers[{{$row }}]"> 
@foreach ($teachers as $teacher)

 @php

$teacherdatas  = DB::table('teachers')->where('id',$teacher->teachers_id)->first(); 

@endphp

  <option 


 

 selected value="{{$teacher->id}}">{{$teacherdatas->firstname}} {{$teacherdatas->lastname}}</option>

@endforeach
        </select>
  </div>
</td>


<td scope="col">



    <div class="form-info-header">
      <span>Show:</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">

        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">  



@foreach($teachers as $teacher)

@php
 $teacherdatas  = DB::table('teachers')->where('id',$teacher->teachers_id)->first(); 
$teachersubjects  = DB::table('subjects_teachers')->where('teachers_id',$teacher->teachers_id)->get(); 
@endphp

 @if($loop->iteration % 3 == 0 )
    
    <div class="form-field" style="margin-right: 3rem;">
           
@endif

 <div class="form-check"> 
 
              <input class="form-check-input" type="radio"  name="schedulecheck[]"          
    id="tag<%=count++%>" 
    style="   width: 1rem !important;
    height: 1rem !important;
    padding: 0;
    border-radius: 50px !important;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;" 

 value=" {{$teacherdatas->firstname}}'s Schedule :
@foreach($teachersubjects as $teachersubject)
@php
$schedules  = DB::table('subjects_teachers_schedule')->where('subjects_teachers_id',$teachersubject->id)->get();
 $subjectname  = DB::table('subjects')->where('id',$teachersubject->subjects_id)->first(); 
@endphp
@foreach($schedules as $schedule)
@php
 $section =  DB::table('sections')->where('id', $schedule->section_id)->first();
@endphp
{{$subjectname->name}} | @isset($section){{$section->grade}}-{{$section->strand}}-{{$section->section_number}}@endisset | {{$schedule->day}} | {{$schedule->start}} - {{$schedule->end}}
@endforeach
@endforeach
"> 
<label class="form-check-label" for="flexRadioDefault1">{{$teacherdatas->firstname}}'s Schedule</label>
</div>
 @if($loop->iteration % 3 == 0 )
</div>

@endif  
@endforeach
      </div>
            </div>
                  </div>










@foreach($teachers as $teacher)

@php
 $teacherdatas  = DB::table('teachers')->where('id',$teacher->teachers_id)->first(); 
$teachersubjects  = DB::table('subjects_teachers')->where('teachers_id',$teacher->teachers_id)->get(); 
@endphp






   <div class="col-10">
      
<select style= "display: none" class="form-select" multiple aria-label="multiple select example" id ="{{$row}}{{$teacherdatas->firstname}}" >






@foreach($teachersubjects as $teachersubject)



@php

$schedules  = DB::table('subjects_teachers_schedule')->where('subjects_teachers_id',$teachersubject->id)->get();
 $subjectname  = DB::table('subjects')->where('id',$teachersubject->subjects_id)->first(); 

@endphp


@foreach($schedules as $schedule)


<option>
@php
 $section =  DB::table('sections')->where('id', $schedule->section_id)->first();
@endphp

 {{$subjectname->name}}|@isset($section){{$section->grade}}-{{$section->strand}}-{{$section->section_number}} @endisset()|{{$schedule->day}} | {{$schedule->start}} - {{$schedule->end}}
</option>

@endforeach

@endforeach

 </select>


</div>



@endforeach


</td>

<td>
   <div class="form-field">
<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="day[{{$row }}]">
  <option value="Monday" selected>Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Wednesday">Wednesday</option>
  <option value="Thursday">Thursday</option>
   <option value="Friday">Friday</option>
</select>
</div>


<script>

  $('starts_at[{{$row }}]').on("change.datetimepicker", function (e) {
    if(e.date){
        $('ends_at[{{$row }}]').datetimepicker(e.date.add(15, 'm'));
    }
    $('ends_at[{{$row }}]').datetimepicker('minDate', e.date)
});


</script>
  <div class="form-field">
 <label for="schoolid">Starts at:</label>
        <input placeholder="Section Number" name="starts_at[{{$row }}]" type="time" class="@error('section_number') is-invalid |@enderror" id="guardianfirstname" aria-describedby="section_number" value="{{old('section_number')}}" required>
        @error('section_number')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>


  <div class="form-field">
 <label for="schoolid">Ends at :</label>
        <input placeholder="Section Number" name="ends_at[{{$row }}]" type="time" class="@error('section_number') is-invalid |@enderror" id="guardianfirstname" aria-describedby="section_number" value="{{old('section_number')}}" required>
        @error('section_number')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror

      </div>
  </td>

</tr>



 





@endforeach  






          
        </tbody>
      </table>
       <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" id="submit-enrollment-application">Submit</button>
    </div>
</form>
    </div>

  </div>





<br>

@endsection