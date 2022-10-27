@extends('template.main')
@section('content')
   @if (Auth::guest())
<div id="home-page-wrapper">
    <div id="main-content">
        <div class="content-header">
            <span class="content-header-text">BNHS Enrollment is now open</span>
        </div>
        <div id="enrollnow-container">
            <div>
                <img src={{URL::asset('logo.png')}} alt="BNHS Logo" id="enrollnow-school-logo">
                <h1 id="admission-text">2022 JHS / SHS <br> ADMISSION <br> GOING ON</h1>
                <a href={{ url('register') }} id="enroll-now-btn">Enroll Now</a>
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
    <div id="aside-content">
        <div class="content-header">
            <span class="content-header-text">Requirements</span>
        </div>
        <p>
            Following requirements must have:
        </p>
        <br>
        <p>
            PSA/NSO/Birth Certificate
            <br>
            SF9/Report Card
        </p>
        <hr>
        <div class="aside-component"></div>
        <div class="aside-component"></div>
        <div class="aside-component"></div>
    </div>

</div>
    @endif
@can('is-admin')
@include('admin-index')
@endcan
@endsection