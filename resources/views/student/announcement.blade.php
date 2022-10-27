@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">

  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Announcements<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>
  
    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
      
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
                   <th scope="col"></th>
              <th scope="col">Content</th>
       
           <th scope="col">Action</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach($announcements as $announcement)

          @php
$article =DB::table('announcements')->where('id' ,$announcement->announcements_id)->first();
          @endphp

          <tr>
    
    <td>{{$article->title}}</td>

<td><div class="text-center">
        <img src="{{asset('requirements/'.$article->image)}}" style="max-width:40%;" class="img-thumbnail"> 
    </div>  </td>

   <td>

            <div class="form-field">
      <div class="form-group">
        <textarea class="form-control" rows="5"  name="specification" style=" width: 500px;" >{{$article->content}}</textarea>
      </div>
    </div>
   </td>

    
           <td>

              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
    <a class="btn btn-md btn-warning" href="{{route('enrolledstudent.student_announcement.show',$article->id) }}" role="button">View</a>
            
        
                </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

 
    </div>

  </div>
</div>


</div>

  

@endsection