@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>قطاع الأستثمار</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="investment-sector.html"> قطاع الأستثمار</a> </p>
    </div>
</div>
@include('layouts.mission')


<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>قطاع الأستثمار</h4>
      </div>
       <div class="row">
         <div class="col-md-12">
             {{ $section->description }}
         </div>
       </div>
    </div>
</div>
@endsection
