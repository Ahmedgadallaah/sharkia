@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>الفرص الأستثمارية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="Investment-opportunities.html">الفرص الأستثمارية</a> </p>
    </div>
</div>
@include('layouts.mission')


<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>الفرص الأستثمارية</h4>
      </div>
       <div class="row">
         <div class="col-md-12 col-12">
             <iframe src="{{asset('cv/invest_chance/'.$chance->pdf)}}" width="100%" height="700px" frameborder="0"></iframe>
         </div>
       </div>
    </div>
</div>
@endsection
