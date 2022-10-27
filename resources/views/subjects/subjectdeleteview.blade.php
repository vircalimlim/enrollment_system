@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

@php

        $availableteachers = DB::table('teachers')->get(); 

        $assignedgrades = DB::table('grades_subjects')->where('subjects_id',$subject->id)->get();    

        $assignedstrands = DB::table('strands_subjects')->where('subjects_id',$subject->id)->get();        
//dd($assignedstrands);
@endphp


<div class="container-fluid" id="add_teacher">
 <form method="POST" action=" {{route('faculty.subjects.destroy',$subject->id) }}">
      @method('DELETE') 
  @csrf

    <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr;">
      <div class="form-field">
        <label for="subjectname">Subject Name</label>
        <input placeholder="Subject Name" name="name" type="text" class="@error('subjeectname') is-invalid |@enderror" id="subjeectname" aria-describedby="subjeectname" value="{{$subject->name}} " required>
        @error('subjeectname')
        <span class="invalid-feedback" role="alert">
          {{$message}}
         
          @enderror
      </div>
    
    </div>


    <div class="form-info-header">
      <span>Assign Teacher</span>
    </div>
    <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">

        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          
           
@foreach($availableteachers as $availableteacher)

 @if($loop->iteration % 3 == 0 )
    
    <div class="form-field" style="margin-right: 3rem;">
           
@endif

  @php

  $loads =  DB::table('subjects_teachers')->where('teachers_id', $availableteacher->id)->get();

  @endphp

 <div class="form-check"> 
              <input class="form-check-input" type="checkbox" value="{{$availableteacher->id}}" name="teachers[]" id="modality" 
              @foreach($loads as $load)
              {{  ($load->subjects_id == $subject->id ? ' checked' : '') }}
              @endforeach    
              >
              <label class="form-check-label" for="flexRadioDefault1">
                {{$availableteacher->firstname}}  {{$availableteacher->middlename}} {{$availableteacher->lastname}}</label>
               
@foreach($loads as $load)
 
 @php 
 
$names = DB::table('subjects')->where('id', $load->subjects_id)->get();

@endphp


@foreach($names as $name)

<small>{{$name->name}} </small> |
@endforeach

@endforeach     
         

  </div>

 @if($loop->iteration % 3 == 0 )

      </div>

@endif  

@endforeach

          </div>


        </div>
   
  
    </div>

     <div class="form-info-header">
      <span>Assign Grade Level</span>
    </div>

      <div class="enrollment-form-field" style="grid-template-columns:  3fr;">
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;" >
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="gradelevel[]" id="modality"
             @foreach($assignedgrades as $assignedgrade)
              {{  (  $assignedgrade->grades_id == 1? ' checked' : '') }}
              @endforeach   
              >
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 7
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="gradelevel[]" id="modality"
                 @foreach($assignedgrades as $assignedgrade)
              {{  (   $assignedgrade->grades_id   == 2? ' checked' : '') }}
              @endforeach   >
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 8
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="gradelevel[]" id="modality"
                 @foreach($assignedgrades as $assignedgrade)
              {{  (  $assignedgrade->grades_id == 3 ? ' checked' : '') }}
              @endforeach   >
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 9
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="gradelevel[]" id="modality"
                 @foreach($assignedgrades as $assignedgrade)
              {{  (  $assignedgrade->grades_id == 4 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 10
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="gradelevel[]" id="grade11"
               onclick="Strands();"    @foreach($assignedgrades as $assignedgrade)
              {{  (  $assignedgrade->grades_id == 5 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 11
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="gradelevel[]" id="grade12"
              onclick="Strands();"    @foreach($assignedgrades as $assignedgrade)
              {{  (  $assignedgrade->grades_id == 6 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                Grade 12 
              </label>
            </div>
          </div>


      </div>
    </div>
      </div>

<div id="strands_subject" >
         <div class="form-info-header">
      <span>Assign Strand</span>
    </div>
         <div  class="enrollment-form-field" style="grid-template-columns:  3fr; "  >
      <div class="form-field">
     
        <div class="enrollment-form-field" style="grid-template-columns: 1fr 1fr 1fr 1fr; padding-left: 1.4rem;">
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="strands[]" id="modality"
              @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 1 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                HUMMS
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="strands[]" id="modality"
               @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 2 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                GAS
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="3" name="strands[]" id="modality" @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 3 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                TVL
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="4" name="strands[]" id="modality"
               @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 4 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                COOKERY
              </label>
            </div>
          </div>
          <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="5" name="strands[]" id="modality"
               @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 5 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
                ICT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="6" name="strands[]" id="modality"
                @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 6 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1" >
                ABM 
              </label>
            </div>
          </div>
         <div class="form-field" style="margin-right: 3rem;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="7" name="strands[]" id="modality"
               @foreach($assignedstrands as $assignedstrand)
              {{  (  $assignedstrand->strands_id == 7 ? ' checked' : '') }}
              @endforeach>
              <label class="form-check-label" for="flexRadioDefault1">
              STEM
                        </label>
            </div>
      
          </div>


      </div>
    </div>
      </div>
 </div>  
  <span id="enrollment-applications-container-base-header">Warning: 
    <small id="enrolemt-application-updated-at">
     Removing the subject's data from the database may cause discreapancies to the subjects and sections below
    </small>

  </span>
    <div class="enrollment-form-field" style="display: flex; flex-direction: flex-end; justify-content: flex-end; align-items: center;">
      <button type="submit" class="btn btn-md btn-danger" >Delete</button>
        <a class="btn btn-md btn-warning" href="{{ URL::previous() }}"  onclick="hide2();">Cancel</a>
    </div>

  </form>
    </div>


    <div class="container-fluid p-0 m-0">
      

      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Teacher</th>
            <th scope="col">Grade | Strand | Section | Schedule</th>
         

          </tr>
         </thead>    

   
        <tbody>



             @foreach($subjects as $subject)

      <tr>
             <td scope="row">{{$loop->iteration}} )</td>

             
@php

 $sections =  DB::table('subjects_teachers_schedule')->where('subjects_teachers_id', $subject->id)->get();

 $teacher =  DB::table('teachers')->where('id', $subject->teachers_id)->first();


@endphp

<td> {{$teacher->firstname}} {{$teacher->middlename}} {{$teacher->lastname}}</td>
          <td>
@foreach($sections as $section)

@php

 $sectiondatas =  DB::table('sections')->where('id', $section->id)->get();

@endphp
           
@foreach($sectiondatas as $sectiondata)

{{$sectiondata->grade}}  - {{$sectiondata->strand}}  -  {{$sectiondata->section_number}} |
    {{$section->day}}  {{$section->start}} -  {{$section->end}}
               <br>
@endforeach              
@endforeach
          </td> 


     
      </tr>
     



        @endforeach

        </tbody>
      </table>

    </div>


  </div>

</div>


</div>

<br>

@endsection