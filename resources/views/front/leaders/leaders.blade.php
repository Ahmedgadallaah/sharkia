@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show investment-bg">
    <h2>قيادات المحافظة</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">قيادات المحافظة</a> &#124; <a href="Governor-cv.html">قيادات المحافظة</a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4> قيادات المحافظة</h4>
      </div>
       <div class="row">
         <div class="col-md-12 col-12 text-center">
             {{-- <img src="{{asset('images/employee/'.$governer->image)}}imgs/leader-bf.png" width="80%"> --}}
             <img src="{{asset('images/employee/leader-bf.png')}}" width="80%">
         </div>
       </div>
    </div>
</div>

@endsection
