@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

  <span id="enrollment-applications-container-base-header">

    {{$subject->id}} - {{$subject->name}} 

      @php

            
$teachers =  DB::table('subjects_teachers')->where('subjects_id', $subject->id)->get();

$assignedgrades =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id' ,'!=','5')->where('grades_id' ,'!=','6')->get();

$withSHS11strands =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id', '5')->get();

$withSHS12strands =  DB::table('grades_subjects')->where('subjects_id', $subject->id)->where('grades_id', '6')->get();
    
    $id = $subject->id;        
         
      @endphp
 </span>
<div class="enrollment-form-field">




 <span id="enrollment-applications-container-base-header">

  Assigned Grades JHS 
 <small id="enrolemt-application-updated-at">
@foreach($assignedgrades as $assignedgrade)

 @php 

       $gradelevels =  DB::table('grades')->where('id', $assignedgrade->grades_id)->get();

@endphp

@foreach($gradelevels as $gradelevel)

             {{$gradelevel->name}} |

           
            
@endforeach
          


   @if($loop->iteration % 3 == 0 )
   <br>
   @endif   
@endforeach

 </small>


  </span>

<span id="enrollment-applications-container-base-header">

  Assigned Grades SHS 
 <small id="enrolemt-application-updated-at">
@foreach($withSHS11strands as $withSHS11strand)

  @php 

       $strands =  DB::table('strands_subjects')->where('subjects_id', $withSHS11strand->subjects_id)->get();


@endphp

@foreach($strands as $strand)

@php

$name =  DB::table('strands')->where('id', $strand->strands_id)->first();

@endphp

       Grade 11 - {{$name->name}} | 
            
@endforeach
          


   @if($loop->iteration % 3 == 0 )
   <br>
   @endif   
@endforeach

<br>

@foreach($withSHS12strands as $withSHS12strand)

  @php 

       $strands =  DB::table('strands_subjects')->where('subjects_id', $withSHS12strand->subjects_id)->get();


@endphp

@foreach($strands as $strand)

@php

$name =  DB::table('strands')->where('id', $strand->strands_id)->first();

@endphp

       Grade 12 - {{$name->name}} | 
            
@endforeach
          


   @if($loop->iteration % 3 == 0 )
   <br>
   @endif   
@endforeach
 </small>


  </span>


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
      <div class="enrollment-form-field">
            <a class="btn btn-md btn-success" href="{{route('faculty.subjects.edit',$id) }}" role="button">Edit</a>

      <a class="btn btn-md btn-danger" href="{{route('faculty.deletesubject',$id) }}" role="button">Delete</a>
      <a style="font-size: 14px;" class="btn btn-warning" href="{{ URL::previous() }}" role="button">Back</a>
    </div>
  </div>

</div>


</div>

<br>

@endsection