@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>المنـــاطــق و المدن الصـــناعـــية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="Industrial-areas.html">المناطق و المدن الصناعية</a> </p>
    </div>
</div>

@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>{{ $title->name }}</h4>
      </div>
       <div class="row">
         <div class="col-md-12">
             {{ $title->description }}
         </div>
         <div class="col-md-12">
             <div class="swiper-container">
            <div class="swiper-wrapper">
@foreach( $title->gallery as $image )
              <div class="swiper-slide">
                  <div class="imgbx">
                      <img src="{{ asset('images/'.$image->image) }}">
                  </div>
              </div>
@endforeach
           </div>
            <!-- Add Pagination -->
            <br><br>
            <div class="swiper-pagination"></div>
         </div>
         </div>
        </div>
    </div>
</div>
@endsection
