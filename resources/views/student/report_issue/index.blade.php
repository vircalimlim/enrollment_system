@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Talk with Us<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>

    <div class="container-fluid p-0 m-0">
    <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
        <div>
        <a href="{{route('enrolledstudent.student_issue_report.create') }}" id="refresh"><i class="fa fa-warning"></i>Create Thread</a>

        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col"></th>
              <th scope="col">Last Activity</th>
     
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($issues as $issue)


          <tr>
         <td>{{$issue->title}}</td>

   <td>
            <div class="form-field">
      <div class="form-group">
       <label for="specification">Content:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$issue->message}}</textarea>
      </div>
    </div>
   </td>

          <td>
            @php

$latest_activity = DB::table('issue_reports_reply')->where('issue_reports_id',$issue->id)->orderBy('id', 'desc')->first();

            @endphp
@isset($latest_activity)
   @if($latest_activity->user_id == $id)
             <div class="form-field">
      <div class="form-group">
         <label for="specification">You replied:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$latest_activity->message}}</textarea>
      </div>
    </div>
   @endif

   @if($latest_activity->user_id != $id)
            <div class="form-field">
      <div class="form-group">
          <label for="specification">Admin replied:</label>
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$latest_activity->message}}</textarea>
      </div>
    </div>
   @endif

   @endisset()
            <td>

              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
  <a class="btn btn-md btn-success" href="{{route('enrolledstudent.student_issue_view.show',$issue->id) }}" role="button">View</a>

            <a class="btn btn-md btn-warning" href="{{route('enrolledstudent.student_issue_report.edit',$issue->id) }}" role="button">Edit</a>
              
                </div>
              </div>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$issues->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection