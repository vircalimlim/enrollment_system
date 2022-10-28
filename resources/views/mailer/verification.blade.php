@component('mail::message')
<div class="table-responsive">
    <!-- <div align="middle" class="table">
        <img src="https://dev.wawclinic.com/assets/images/landing-page/logo.png" alt="image">
    </div> -->
    <!-- <div class="table">
        <label class="fw-bold h4">From: </label><span>{{$verification['email']}}</span>
    </div> -->
    <div class="table">
        <p class="text-capitalize">{{ $verification['message'] }}</p>
        <p class="text-justify">{{ $verification['body'] }}</p>
        <span>Click this</span>
        <a href="{{ $verification['url'] }}">link to verify</a>
        <br>
        <p>{{ $verification['thankyou'] }}</p>
    </div>
</div>
@endcomponent