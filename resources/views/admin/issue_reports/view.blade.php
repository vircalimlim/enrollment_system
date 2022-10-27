@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Thread created by: {{$student->name}} {{$student->lastname}}<small id="enrolemt-application-updated-at">
        Subject : {{$issue->title}}
    </small>
        <div class="form-field">
      <div class="form-group">
       <label for="specification">Message:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$issue->message}}</textarea>
      </div>
    </div>
    </span>
    <div class="container-fluid p-0 m-0">
    <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <div>
              <form method="POST" action="{{route('admin.issue_reports.show',$issue->id) }}">
     
@method('GET')
   @csrf

<input type="hidden" name="student_id" value="{{$issue->user_id}}">
   <button type ="submit" id="refresh"><i class="fa fa-warning"></i>Reply</button>
     <a href="{{route('admin.users.show',$issue->user_id) }}" id="refresh"><i class="fa fa-warning"></i>View Student Profile</a>
 </form>


     

        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
                    </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
<td></td>
        <td>
          
          @if($message->user_id == $issue->user_id )
            
       <span id="enrollment-applications-container-base-header">  {{$student->name}} replied <small id="enrolemt-application-updated-at"> {{$message->created_at}}</small></span>
          @endif
         @if($message->user_id != $issue->user_id)
       <span id="enrollment-applications-container-base-header">  BNHS replied <small id="enrolemt-application-updated-at"> {{$message->created_at}}</small></span>
          @endif
      </td>
   <td>
            <div class="form-field">
      <div class="form-group">
       <label for="specification">Message:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 900px;" >{{$message->message}}</textarea>
      </div>
    </div>
   </td>

          <td>

 
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$messages->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection