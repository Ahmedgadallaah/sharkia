@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>أسس ومقومات الاستثمار</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="Ingredients-for-investment.html">مقومات الاستثمار</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>أسس ومقومات الاستثمار</h4>
      </div>
       <div class="row text-center">
           @foreach($roles as $role)
         <div class="col-md-6">
             <div class="row">
             <div class="col-md-12"><a href="#"><p> {{ $role->name }} <p></a></div>
                 <div class="col-md-12"><a href="#"><img src="imgs/investment/1.2.png" width="60%"></a></div>
             </div>
         </div>
         @endforeach
         <div class="col-md-6">
             <div class="row">
                 <div class="col-md-12"><a href="#"><img src="imgs/investment/1-3.png" width="60%"></a></div>
                 <div class="col-md-12"><a href="#"><img src="imgs/investment/1-4.png" width="60%"></a></div>
             </div>
         </div>
       </div>
    </div>
</div>
@endsection
