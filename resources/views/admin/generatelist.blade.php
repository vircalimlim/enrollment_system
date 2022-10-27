@extends('template.main')
@section('content')

<div id="enrollment-applications-container-base">
  <div id="enrollment-table-container">

    <span id="enrollment-applications-container-base-header">Generated List<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small></span>

    <div class="container-fluid p-0 m-0">
      <div id="search-table" class="form-field">
        <input type="search" placeholder="Search Queries" class="form-control search-input" data-table="table" />
           <div>
           <a class="btn btn-md btn-warning" href="{{url('admin/statistics')}}"role="button">Back</a>
      
        </div>
      </div>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">LRN</th>

            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
             <th scope="col">Grade</th>

            <th scope="col">PSA/Birth Certificate/NSO</th>
            <th scope="col">SF9/Report Card</th>
            <th scope="col">Grade Level</th>
            <th scope="col">Strand</th>
            <th scope="col">Section</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td scope="row">{{$user->lrnnumber}}</td>
            <td>{{$user ->name}}</th>
            <td>{{$user ->middlename}}</td>
            <td>{{$user ->lastname}}</td>
            <td>{{$user ->generalaverage}}</td>



            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/birthcertificate',$user->id) }}" role="button">View Requirement</a>
            </td>
            <td>
              <a class="btn btn-outline-secondary" href="{{url('admin/reportcard',$user->id) }}" role="button">View Requirement</a>
            </td>
             <td>{{$user->gradeleveltoenrolin}}</td>
             <td>{{$user->strandtoenrolin}}</td>



@php


@endphp

 <td>


@php
 $adviser =  DB::table('teachers')->where('advisory',$user->section)->first();

@endphp

Section Number {{$user->section}}<br> Adviser :{{$adviser->firstname}} {{$adviser->middlename}} {{$adviser->lastname}} 




           </td>
            <td>


              {{-- <form action="{{route('admin.users.destroy',$user->id) }}" method ="POST" >
              @method("DELETE")--}}
              @csrf


              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <a class="btn btn-md btn-warning" href="{{route('admin.users.show',$user->id) }}" role="button">View</a>
                </div>
              </div>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{$users->links()}}
    </div>

  </div>
</div>


</div>

<br>

@endsection