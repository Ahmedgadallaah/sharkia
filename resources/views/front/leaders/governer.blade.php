@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show investment-bg">
    <h2>السيرة الذاتية لمحافظ الشرقية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">قيادات المحافظة</a> &#124; <a href="Governor-cv.html">السيرة الذاتية لمحافظ الشرقية</a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>السيرة الذاتية لمحافظ الشرقية</h4>
      </div>
       <div class="row">
         <div class="col-md-12 text-center"><h6>{{ $governer->name }}</h6></div>
         <div class="col-md-12 col-12 text-center">
             <iframe src="{{asset('cv/employee/'.$governer->cv)}}" width="80%" height="700px" frameborder="0"></iframe>
         </div>
       </div>
    </div>
</div>
@endsection
