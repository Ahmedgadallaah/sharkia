@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>الخريطة الأستثمارية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="investment-map.html">الخريطة الأستثمارية</a> </p>
    </div>
</div>
@include('layouts.mission')


<!-- ************************************************************************* -->

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">

      </div>
       <div class="row">
         <div class="col-md-12 col-12">
             <iframe src="{{asset('cv/invest_map/'.$map->pdf)}}" width="100%" height="700px" frameborder="0"></iframe>
         </div>
       </div>
    </div>
</div>
@endsection
