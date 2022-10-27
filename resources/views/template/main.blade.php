<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href={{URL::asset('logo.png')}} type="image/x-icon">
  <link href="{{asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{asset('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src="htpps://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <script src="{{asset('js/app.js') }}" defer> </script>

<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <title>
    @if (Request::is('index') || Request::is('/'))
    {{ 'BNHS Enrollment System' }}
    @elseif (Request::is('user/about'))
    {{ 'About' }}
    @elseif (Request::is('user/contact'))
    {{ 'Contact' }}
    @elseif (Request::is('login'))
    {{ 'Login' }}
    @elseif (Request::is('register'))
    {{ 'Register' }}
    @elseif (Request::is('forgot-password'))
    {{ 'Forgot Password' }}
    @elseif (Request::is('user/verify'))
    {{ 'Email Verification' }}
    @elseif (Request::is('admin/users/create*'))
    {{ 'Create New Admin' }}
    @elseif (Request::is('admin/users*'))
    {{ 'Applications | New' }}
    @elseif (Request::is('admin/birthcertificate*'))
    {{ 'Applications | Birth Certificate' }}
    @elseif (Request::is('admin/reason*'))
    {{ 'Applications | Rejection Reason' }}
    @elseif (Request::is('admin/updated*'))
    {{ 'Applications | Updated' }}
    @elseif (Request::is('admin/rejected*'))
    {{ 'Applications | Rejected' }}
    @elseif (Request::is('admin/accepted*'))
    {{ 'Applications | Accepted' }}
    @elseif (Request::is('email/verify*'))
    {{ 'Verify Email' }}

    @endif
  </title>
</head>

<body>
  <div id="page-content-wrapper">
    <nav id="navbar">
      <a href={{ url('index')}} id="navbar-logo-brand">
        <img src={{URL::asset('logo.png')}} alt="" id="logo">
        <span id="system-name">
          <span>Basista National High School</span>
          <small>Enrollment System</small>
        </span>
      </a>

      @if (Route::has('login'))
      <div id="navlink-container-base">
        <ul id="navlink-container">
          @if (Auth::guest())
          <li class="navlinks">
            <a href={{ url('index')}} class="navlinks-anchor {{ Request::is('index*') ? 'active' : '' }}">Home</a>
          </li>
          <li class="navlinks">
            <a href={{url('user/about') }} class="navlinks-anchor {{ Request::is('user/about*') ? 'active' : '' }}">About</a>
          </li>
          <li class="navlinks">
            <a href={{url('user/contact') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Contact</a>
          </li>
          @endif
          @auth
  @can('is-student')
   <li class="navlinks">
            <a href={{url('enrolledstudent/studentprofile') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Student Profile</a>
          </li>
      <li class="navlinks">
            <a href={{url('enrolledstudent/studentsectionview') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Schedule</a>
          </li>

           <li class="navlinks">
            <a href={{route('enrolledstudent.student_announcement.index') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Announcements</a>
          </li>
             <li class="navlinks">
            <a href={{route('enrolledstudent.student_issue_report.index') }} class="navlinks-anchor {{ Request::is('user/contact*') ? 'active' : '' }}">Talk with Us</a>
          </li>

  @endcan()
          @can('is-admin')
     <li class="navlinks">
            <a href={{url('admin/users') }} class="navlinks-anchor {{ Request::is('admin/users*') ||  Request::is('admin/updated*') || Request::is('admin/rejected*') || Request::is('admin/accepted*') || Request::is('admin/reason*') || Request::is('admin/reportcard*') || Request::is('admin/birthcertificate*') ? 'active' : '' }}" id="applications"> Enrolment Applications</a>
          </li>
 
    <li class="navlinks">
            <a href={{route('faculty.teachers.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Teachers</a>
          </li>

      <li class="navlinks">
            <a href={{route('faculty.subjects.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Subjects</a>
          </li>

          <li class="navlinks">
            <a href={{route('faculty.sections.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Sections</a>
          </li>
  
  
     
               <li class="navlinks">
            <a href={{route('admin.announcements.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Announcements</a>
          </li>
          <li class="navlinks">
            <a href={{route('admin.management.index') }} class="navlinks-anchor {{ Request::is('admin/users/create*') ? 'active' : '' }}">Admin Management</a>
          </li>
          @endcan
          <li class="navlinks">
            <a href={{ url('logout') }} class="navlinks-anchor" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          </li>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none">
            @csrf
          </form>
          @else
          <li class="navlinks">
            <a href={{ route('login') }} class="navlinks-anchor {{ Request::is('login*') || Request::is('forgot-password*') || Request::is('user/verify*') ? 'active' : '' }}">Login</a>
          </li>
          @if (Route::has('register'))
          <li class="navlinks">
            <a href={{route('student.check.create') }} class="navlinks-anchor {{ Request::is('register*') ? 'active' : '' }}">Enroll</a>
          </li>



          @endif
          @endauth
        </ul>
      </div>
      @endif
    </nav>

    <main id="main">
      @include('partials.alerts')
      @yield('content')
      @can('logged-in')
      @endcan()
    </main>

    <footer>
      <img src={{URL::asset('logo.png')}} alt="" id="footer-logo">
      <span id="copyright">
        &copy; Copyright 2022 <br> Basista National High School
      </span>
    </footer>
  </div>
  @if (Request::is('admin/users/create*'))
  <script>
    document.getElementById('applications').classList.remove('active');
  </script>
  @endif
  <script>
    $(document).ready(() => {
      $('.alert').delay(4000).fadeOut('slow');
    });

    const displayChange = () => {
      let ic1 = document.getElementById('yesCheck1').value;
      let ic2 = document.getElementById('noCheck1').value;
      let ir = document.getElementById('indigencyradio').value;
      let glsi = document.getElementById('glsi');

      if(ic1.checked && ir.checked) {
        glsi.style.gridTemplateColumns = '2fr 1fr';
      } else if (ic1.checked && !ir.checked || !ic1.checked && ir.checked) {
        glsi.style.gridTemplateColumns = '3fr';
      }
    }

    $(function() {
      var mothertongue = [
        "Aklanon",
        "Bikol",
        "Cebuano",
        "Chavacano",
        "English",
        "Filipino",
        "Hiligaynon",
        "Ibinag",
        "Ilocano",
        "Ivatan",
        "Kapampangan",
        "Kinaray-a",
        "Maguindanao",
        "Maranao",
        "Pangasinan"
      ];
      $("#mothertongue").autocomplete({
        source: mothertongue
      });
    });

    $(function() {
      var IndegenousCommunitySpecification = [
        "Tagalog",
        "Ilokano",
        "Kapampangan",
        "Bikolano",
        "Aeta",
        "Igorot",
        "Ivatan",
        "Mangyan",
        "Cebuano",
        "Waray",
        "Ilonggo",
        "Ati",
        "Saludnon",
        "Badjao",
        "Yakan",
        "B'laan",
        "Maranao",
        "T'boli",
        "Tausug",
        "Bagobo"
      ];
      $("#IndegenousCommunitySpecification").autocomplete({
        source: IndegenousCommunitySpecification
      });
    });
    $(function() {
      var religion = [
        "Roman Catholic",
        "Muslim/Islamic",
        "Catholic",
        "Born Again",
        "Buddhists",
        "Atheist",
        "Protestants",
        "El Shaddai",
        "Church of the Nazarene",
        "Church of Jesus Christ and the Latter Day Saints",
        "Seventh-Day Adventists (Central Phil. Union Conf.)",
        "Maguindanao",
        "Hindu",
        "Mennonites",
        "Philippine Episcopal Church",
        "United Church of Christ in the Philippines",
        "Evangelical",
        "Baptist World Alliance",
        "Methodist",
        "Judaism",
        "Ang Dating Daan",
        "Worldwide Church of God",
        "Jehovah's Witnesses",
        "Assemblies of God (Ilocos Norte)",
        "God World Missions Church",
        "Presbyterian",
        "Lutheran Church in the Philippines",
        "Mount Banahaw Holy Confederation",
        "Rizalistas",
        "Aglipayan (Philippine Independence Church)",
        "Iglesia ni Cristo (Church of Christ)",
        "Philippine Benevolent Missionary Association (PBMA)",
      ];
      $("#religion").autocomplete({
        source: religion,
      });
    });


    function yesnoCheck() {
      if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
      } else document.getElementById('ifYes').style.visibility = 'hidden';

      if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes2').style.visibility = 'visible';
      } else document.getElementById('ifYes2').style.visibility = 'hidden';
      document.getElementById('ifYes3').style.visibility = 'hidden';

    }

    function yesnoCheck1() {
      if (document.getElementById('yesCheck1').checked) {
        document.getElementById('ifYes1').style.display = 'grid';
      } else document.getElementById('ifYes1').style.display = 'none';

    }

    function yesnoCheck2() {
      if (document.getElementById('yesCheck2').checked) {
        document.getElementById('ifYes3').style.visibility = 'visible';
      } else document.getElementById('ifYes3').style.visibility = 'hidden';

    }

    function LRNyesnoCheck() {
      if (document.getElementById('lrn').checked) {
        document.getElementById('LRNyes').style.display = 'grid';
      } else document.getElementById('LRNyes').style.display = 'none';

    }

    function PSAyesnoCheck() {
      if (document.getElementById('psastatus').checked) {
        document.getElementById('PSAyes').style.display = 'grid';
      } else document.getElementById('PSAyes').style.display = 'none';

    }

     function IndigencyyesnoCheck() {
      if (document.getElementById('indigencyradio').checked) {
        document.getElementById('indigencynumber').style.display = 'grid';
      } else document.getElementById('indigencynumber').style.display = 'none';

    }

         function TransferyesnoCheck() {
      if (document.getElementById('indigencyradio').checked) {
        document.getElementById('indigencynumber').style.visibility = 'visible';
      } else document.getElementById('indigencynumber').style.visibility = 'hidden';

    }



    $(document).ready(function() {
      $('#lastgradelevelcompleted').on('change', function() {

        var textBox = document.getElementById("lastrandattended2");


        var check = document.getElementById("gradeleveltoenrolin");

        if (this.value == 'Grade 10') {
          document.getElementById('laststrandattended').style.visibility = 'visible';
          document.getElementById('strandtoenrolin').style.visibility = 'visible';
          document.getElementById('semester').style.visibility = 'visible';
          textBox.value = "Not Applicable";
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();
        }
        if ((this.value == 'Grade 11') || (this.value == 'Grade 12')) {
          document.getElementById('laststrandattended').style.visibility = 'visible';
          document.getElementById('strandtoenrolin').style.visibility = 'visible';
          document.getElementById('semester').style.visibility = 'visible';
          $("#1").show();
          $("#2").show();
          $("#3").show();
          $("#4").show();
          $("#5").show();
          $("#6").show();
          $("#7").show();

        } else {
          document.getElementById('laststrandattended').style.visibility = 'hidden';
          document.getElementById('strandtoenrolin').style.visibility = 'hidden';
          document.getElementById('semester').style.visibility = 'hidden'
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();
        }

      });

    });










   /* $(document).ready(function() {
      $('#gradeleveltoenrolin').on('change', function() {

        var textBox = document.getElementById("lastrandattended2");

        if (this.value == 'Grade 10') {
          document.getElementById('laststrandattended').style.visibility = 'hidden';
          document.getElementById('strandtoenrolin').style.visibility = 'hidden';
          document.getElementById('semester').style.visibility = 'hidden'
          $("#1").hide();
          $("#2").hide();
          $("#3").hide();
          $("#4").hide();
          $("#5").hide();
          $("#6").hide();
          $("#7").hide();

        }


      });

    });*/

function show1(){
     document.getElementById('transfer').style.display = 'grid';
}
function hide1(){
     document.getElementById('transfer').style.display = 'none';
}

function show2(){
     document.getElementById('add_teacher').style.display = 'grid';

}
function hide2(){
     document.getElementById('add_teacher').style.display = 'none';

}

function show3(){
     document.getElementById('new_schoolyear').style.display = 'grid';
      document.getElementById('update_schoolyear').style.display = 'none';

}
function hide3(){
     document.getElementById('new_schoolyear').style.display = 'none';

}

function show4(){
     document.getElementById('update_schoolyear').style.display = 'grid';
          document.getElementById('new_schoolyear').style.display = 'none';

}
function hide4(){
     document.getElementById('update_schoolyear').style.display = 'none';

}

function Strands() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
  if ((checkBox.checked == true)||(checkBox2.checked == true)){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}



function Strands2() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
 if ((checkBox.checked == true)||(checkBox2.checked == true)){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}

function Strands3() {
  var checkBox = document.getElementById("grade11");
  var checkBox2 = document.getElementById("grade12");

  var text = document.getElementById("strands_subject");
  if (checkBox2.checked == true){
   text.style.display = "block";
  } 

  else {
     text.style.display = 'none';
  }
}




    function update() {
      var ddl = document.getElementById("lastgradelevelcompleted");
      var selectedOption = ddl.options[ddl.selectedIndex];
      var lastgradelevelcompleted = selectedOption.getAttribute("data");
      var textBox = document.getElementById("gradeleveltoenrolin");
      if (lastgradelevelcompleted == "Grade 7") {
        textBox.value = "Grade 7";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").hide();

        $("#grade9").hide();
        $("#grade10").hide();
        $("#grade11").hide();
        $("#grade12").hide();



      } else if (lastgradelevelcompleted  == "Grade 8") {
        textBox.value = "Grade 8";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").hide();

 
        $("#grade10").hide();
        $("#grade11").hide();
        $("#grade12").hide();

      } else if (lastgradelevelcompleted  == "Grade 9") {
        textBox.value = "Grade 9";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").hide();
   
        $("#grade11").hide();
        $("#grade12").hide();

      } else if (lastgradelevelcompleted  == "Grade 10") {
        textBox.value = "Grade 10";
        document.getElementById('strandtoenrolin').style.visibility = 'hidden';
        document.getElementById('semester').style.visibility = 'hidden';
       
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").show();
        $("#grade11").hide();
 
        $("#grade12").hide();

      } else if (lastgradelevelcompleted == "Grade 11") {
        textBox.value = "Grade 11";
        document.getElementById('strandtoenrolin').style.visibility = 'visible';
        document.getElementById('semester').style.visibility = 'visible';
      
        $("#grade11").show();

        $("#grade9").show();
        $("#grade10").show();
        $("#grade7").show();
        $("#grade8").show();
  $("#grade12").hide();
      } else if (lastgradelevelcompleted == "Grade 12") {
        textBox.value = "Grade 12";
       document.getElementById('strandtoenrolin').style.visibility = 'visible';
        document.getElementById('semester').style.visibility = 'visible';
        $("#grade7").show();
        $("#grade8").show();
        $("#grade9").show();
        $("#grade10").show();
        $("#grade11").show();
        $("#grade12").show();
      }
    }





function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text1");
  if (checkBox.checked == true){
   text.style.display = "none"; 
  } else {
     text.style.display = "block";
  }
}

function  Password() {
  var checkBox = document.getElementById("existing_account");
  var text = document.getElementById("enrolment_password_view");
  if (checkBox.checked == true){
   text.style.display = "block"; 
  } else {
     text.style.display = "none";
  }
}


    $(function() {
      $("#birthday").datepicker({
        onSelect: function(value, ui) {
          var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
          $('#age').val(age);
        },

        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "c-100:c+0"
      });

    });

    $('#chooseFile').bind('change', function() {
      let filename = $("#chooseFile").val();
      if (/^\s*$/.test(filename)) {
        $("#file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
      } else {
        $("#file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
      }
    });

    $('#chooseFile2').bind('change', function() {
      let filename2 = $("#chooseFile2").val();
      if (/^\s*$/.test(filename2)) {
        $("#file-upload2").removeClass('active');
        $("#noFile2").text("No file chosen...");
      } else {
        $("#file-upload2").addClass('active');
        $("#noFile2").text(filename2.replace("C:\\fakepath\\", ""));
      }
    });


    (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
        var search_input;

        function _onInputSearch(e) {
          search_input = e.target;
          var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
          myArray.forEach.call(tables, function(table) {
            myArray.forEach.call(table.tBodies, function(tbody) {
              myArray.forEach.call(tbody.rows, function(row) {
                var text_content = row.textContent.toLowerCase();
                var search_val = search_input.value.toLowerCase();
                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
              });
            });
          });
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('search-input');
            myArray.forEach.call(inputs, function(input) {
              input.oninput = _onInputSearch;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          TableFilter.init();
        }
      });

    })(document);

    function strand() {


      var ddl = document.getElementById("laststrandattended2");
      var selectedOption = ddl.options[ddl.selectedIndex];
      var laststrandattended = selectedOption.getAttribute("data2");
      var textBox = document.getElementById("strandtoenrolin2");





      if (laststrandattended == "HUMMS") {
        textBox.value = "HUMMS";


      } else if (laststrandattended == "GAS") {
        textBox.value = "GAS";


      } else if (laststrandattended == "TVL") {
        textBox.value = "TVL";


      } else if (laststrandattended == "ICT") {
        textBox.value = "ICT";


      } else if (laststrandattended == "ABM") {
        textBox.value = "ABM";


      } else if (laststrandattended == "COOKERY") {
        textBox.value = "COOKERY";


      } else if (laststrandattended == "STEM") {
        textBox.value = "STEM";


      }
    }



        

  </script>
</body>

</html>