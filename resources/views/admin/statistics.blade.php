   @extends('template.main')


  @section('content')
    <div id="home-page-wrapper">
    <div id="main-content">

<style type="text/css">

</style>

<script type="text/javascript">
  
  $(document).ready(function() {
  barChart();
    barChart2();
//  lineChart();
  //areaChart();
  donutChart();
  donutChart2();


  $(window).resize(function() {
    window.barChart.redraw();
      window.barChart2.redraw();
 
    window.donutChart.redraw();
    window.donutChart2.redraw();
  });
});

function barChart() {
  window.barChart = Morris.Bar({
    element: 'bar-chart',
    data: [
      { y: 'Total', a:{{$present}}, b:{{$past}} },
      { y: 'Grade 7', a:{{$present_g7}}, b:{{$past_g7}} },
      { y: 'Grade 8', a:{{$present_g8}}, b:{{$past_g8}} },
      { y: 'Grade 9', a:{{$present_g9}}, b:{{$past_g9}} },
      { y: 'Grade 10', a:{{$present_g10}}, b:{{$past_g10}} },
      { y: 'Grade 11', a:{{$present_g10}}, b:{{$past_g11}} },
      { y: 'Grade 12', a:{{$present_g10}}, b:{{$past_g12}} }


    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Present S.Y', 'Past S.Y'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}

function barChart2() {
  window.barChart = Morris.Bar({
    element: 'bar-chart2',
    data: [
      { y: 'GAS', a:{{$present_gas}}, b:{{$past_gas}} },
      { y: 'HUMMS', a:{{$present_humms}}, b:{{$past_humms}} },
      { y: 'TVL', a:{{$present_tvl}}, b:{{$past_tvl}} },
      { y: 'COOKERY', a:{{$present_cookery}}, b:{{$past_cookery}} },
      { y: 'ICT', a:{{$present_ict}}, b:{{$past_ict}} },
      { y: 'ABM', a:{{$present_abm}}, b:{{$past_abm}} },
      { y: 'STEM', a:{{$present_stem}}, b:{{$past_stem}} },

    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Present S.Y', 'Past S.Y'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}



function donutChart() {
  window.donutChart = Morris.Donut({
  element: 'donut-chart',
  data: [
    {label: "GAS", value: {{$present_gas}}},
    {label: "HUMMS", value: {{$present_humms}}},
    {label: "TVL", value: {{$present_tvl}}},
    {label: "COOKERY", value: {{$present_cookery}}},
    {label: "ICT", value: {{$present_ict}}},
    {label: "ABM", value: {{$present_abm}}},
     {label: "STEM", value: {{$present_stem}}}

  ],
  resize: true,
  redraw: true
});
}

function donutChart2() {
  window.donutChart = Morris.Donut({
  element: 'donut-chart2',
  data: [
    {label: "Grade 7", value: {{$present_g7}} },
    {label: "Grade 8", value: {{$present_g8}} },
    {label: "Grade 9", value: {{$present_g9}} },
    {label: "Grade 10", value:{{$present_g10}} },
    {label: "Grade 11", value: {{$present_g11}} },
    {label: "Grade 12", value: {{$present_g12}} },
  ],
  resize: true,
  redraw: true
});
}

</script>


</head>
<body>
  <section class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <span class="content-header-text">Student Distribution By Grade</span>
        <div id="bar-chart"></div>
      </div>
     
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Data Summary</h5>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of Students in Present S.Y is   
      {{$present_total_grade = $present_g7 + $present_g8 + $present_g9 + $present_g10 + $present_g11 + $present_g12 }}
</h6>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of Students in Past S.Y is 
    {{$past_total_grade = $past_g7 + $past_g8 + $past_g9 + $past_g10 + $past_g11 + $past_g12 }}
</h6>
<hr>
    @if($present_total_grade < $past_total_grade)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
       $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
   $total =  abs($total);
   
    @endphp
    BNHS students decreased by {{round($total)}}%
</h6>
    @endif

        @if($present_total_grade > $past_total_grade)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
         $total = (($present_total_grade - $past_total_grade)/$past_total_grade) * 100;
         $total = abs($total);
    @endphp
    SHS students increaseed by {{round($total)}}%
</h6>
    
    @endif
  </div>
</div>

   

      
     <div class="col-md-6">
        <br>
        <br>
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Data Summary</h5>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Present S.Y is   
      {{$present_total_strand = $present_gas + $present_tvl + $present_humms + $present_abm + $present_ict + $present_cookery }}
</h6>
<hr>
    <h6 class="card-subtitle mb-2 text-muted">Total number of SHS Students in Past S.Y is 
    {{$past_total_strand = $past_gas + $past_tvl + $past_humms + $past_abm + $past_ict + $past_cookery }}
</h6>
<hr>
    @if($present_total_strand < $past_total_strand)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students decreased by {{round($total)}}%
</h6>
    @endif

        @if($present_total_strand > $past_total_strand)
  <h6 class="card-subtitle mb-2 text-muted">
    @php
  $total = (($present_total_strand - $past_total_strand)/$past_total_strand) * 100;
   $total =  abs($total);
    @endphp
    SHS students increaseed by {{round($total)}}%
</h6>
    
    @endif
  </div>
</div>
    </div>
  </section>
</body>
      
    </div>

    <div id="aside-content">
                        <div class="content-header">
            <span class="content-header-text">Student Census<br>
            </span>
<small id="enrolemt-application-updated-at"><i class="fi fi-rr-calendar"></i> Latest update: <?php echo date('m/d/y'); ?></small>
        </div>
        <hr>
                   <div class="col-md-6">

    
      <div class="card" style="width: 18rem;">
  <div class="card-body">

    <h8 class="card-title">Student Data <br>Analysis</h8>
      <hr>
<ul class="list-group">
  <li class="list-group-item">Male : {{$male}}</li>
  <li class="list-group-item">Female : {{$female}}</li>
     <hr>
  <li class="list-group-item">Old Student : {{$old}}</li>
  <li class="list-group-item">Transferee : {{$transferee}}</li>
  <li class="list-group-item">Balik Aral : {{$returning}}</li>
<hr>
  <li class="list-group-item">#1 Mothertounge : {{$top_mothertounge->mothertongue}}</li>
  <hr>

  @if($top_modality->modality_id == 1)
@php $modality = "Modular Print" @endphp
  @endif

@if($top_modality->modality_id == 2)
@php $modality = "Modular Digital" @endphp
  @endif

@if($top_modality->modality_id == 3)
@php $modality = "Online" @endphp
  @endif

@if($top_modality->modality_id == 4)
@php $modality = "Educational Television" @endphp
  @endif

@if($top_modality->modality_id == 5)
@php $modality = "Radio-Based Instruction" @endphp
  @endif

@if($top_modality->modality_id == 6)
@php $modality = "Home Schooling" @endphp
  @endif

@if($top_modality->modality_id == 7)
@php $modality = "Blended" @endphp
  @endif

@if($top_modality->modality_id == 8)
@php $modality = "Face to Face" @endphp
  @endif
  <li class="list-group-item">#1 Modality :<br> {{$modality}}</li>
</ul>


  </div>
</div>
 </div>
<br>
                       <div class="col-md-6">

    
      <div class="card" style="width: 18rem;">
  <div class="card-body">

    <h8 class="card-title">Enrollee Topography <br>Analysis</h8>
      <hr>
<ul class="list-group">
  <li class="list-group-item">#1 Brgy : <br> {{$top_baranggay->permanentbaranggay}}</li>
  <li class="list-group-item">#1 Municipality :<br> {{$top_municipality->permanentmunicipality}}</li>
  <li class="list-group-item">#1 Province :<br> {{$top_province->permanentprovince}}</li>

</ul>



  </div>
</div>
 </div>
 <br> 
                   <div class="col-md-6">

    
      <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h4 class="card-title">Generate List</h4>
<hr>
<ul class="list-group">
  <li class="list-group-item">

<form method ="POST"  action="list">
@method('GET')
@csrf
    
 <button type="submit" class="btn btn-outline-secondary" >Student 4p's Member <br></button>
     <input type="hidden" name="list" value="1"> 
                </form>

  </li>
  <li class="list-group-item">

<form method ="POST"  action="list">
@method('GET')
@csrf
    
 <button type="submit" class="btn btn-outline-secondary" > Student with PSA Numbers <br></button>
     <input type="hidden" name="list" value="2"> 
</form>
  </li>

    <li class="list-group-item">

<form method ="POST"  action="list">
@method('GET')
@csrf
    
 <button type="submit" class="btn btn-outline-secondary" > Student Transferees <br></button>
     <input type="hidden" name="list" value="3"> 
</form>
  </li>

    <li class="list-group-item">

<form method ="POST"  action="list">
@method('GET')
@csrf
    
 <button type="submit" class="btn btn-outline-secondary" > Student Balik/Aral<br></button>
     <input type="hidden" name="list" value="4"> 
</form>
  </li>

</ul>
  </div>
</div>
     

        </div>
     

        
    </div>

</div>
@endsection