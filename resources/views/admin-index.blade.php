
    <div id="home-page-wrapper">
    <div id="main-content">
        <div class="content-header">
            <span class="content-header-text">Welcome to BNHS Enrolment System</span>
        </div>
        <div id="enrollnow-container">
            <div>

             @include('template.schoolyear')
            </div>
            <div>

            </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
        <br>
      
        <div class="content-header">
            <span class="content-header-text">VISION</span>
        </div>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorum soluta officiis adipisci. Velit quia itaque corrupti ipsa nemo eveniet ad. In delectus eveniet pariatur harum ea expedita laudantium ratione.
        </p>
        <br>
        <div class="content-header">
            <span class="content-header-text">MISSION</span>
        </div>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorum soluta officiis adipisci. Velit quia itaque corrupti ipsa nemo eveniet ad. In delectus eveniet pariatur harum ea expedita laudantium ratione.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorum soluta officiis adipisci. Velit quia itaque corrupti ipsa nemo eveniet ad. In delectus eveniet pariatur harum ea expedita laudantium ratione.
        </p>
        <br>
        <div class="content-header">
            <span class="content-header-text">OBJECTIVES</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni velit deleniti quia iste, dignissimos illo, harum, reiciendis sint similique necessitatibus voluptatum.</p>
        <p><b>1. Lorem Ipsum dolor sit amet</b>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit itaque amet quas, enim necessitatibus molestiae! Autem expedita ipsum accusamus cum iusto quam, eos officia perspiciatis deleniti natus, ex nobis recusandae!</p>
        </p>
        <p><b>2. Amet consectetur adipisicing elit</b>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit itaque amet quas, enim necessitatibus molestiae! Autem expedita ipsum accusamus cum iusto quam, eos officia perspiciatis deleniti natus, ex nobis recusandae!</p>
        </p>
        <p><b>3. Sit itaque amet quas</b>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit itaque amet quas, enim necessitatibus molestiae! Autem expedita ipsum accusamus cum iusto quam, eos officia perspiciatis deleniti natus, ex nobis recusandae!</p>
        </p>
    </div>
@php

$enrolled = DB::table('role_user')->where('role_id','2')->count();
$pending = DB::table('role_user')->where('role_id','4')->count();
$declined = DB::table('role_user')->where('role_id','5')->count();
$appeals = DB::table('appeals')->count();
$issues = DB::table('issue_reports')->count();
@endphp
    <div id="aside-content">
        <div class="content-header">
            <span class="content-header-text">General Report<br>
            </span>
<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small>
        </div>
    

        <br>

        <hr>
        <div class="aside-component">
             <div id="search-table" class="form-field">
 <a href="{{url('admin/accepted') }}"   id="refresh">Accepted Enrolment Forms: <br>{{$enrolled}}</a>
        </div>
             <div id="search-table" class="form-field">
 <a href="{{route('admin.users.index') }}"  id="refresh">Pending Enrolment Forms: <br>{{$pending}}</a>
        </div>
            <div id="search-table" class="form-field">
  <a href="{{url('admin/rejected') }}"  id="refresh">Rejected Enrolment Forms: {{$declined}} </a>
        </div>
             <div id="search-table" class="form-field">
<a href="{{route('admin.appeals.index') }}" id="refresh">Appeals Received: <br>{{$appeals}} </a>
        </div>
        <div id="search-table" class="form-field">
     <a href="{{route('admin.issue_reports.index') }}" id="refresh"> Reported Issues: <br>{{$issues}} </a>
        </div>
    <div id="search-table" class="form-field">
 <a href="{{url('admin/statistics') }}"  id="refresh">View Statistical <br> Report</a>
        </div>
      </div>

        
    </div>

</div>