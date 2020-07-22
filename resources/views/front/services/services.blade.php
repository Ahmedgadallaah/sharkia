@extends('index')
@section('content')

<div class="banner-show entit-bg">
    <h2>الخدمات</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> الخدمات </a> &#124; <a href="services.html"> خدمات البوابة </a> </p>
    </div>
</div>
@include('layouts.mission')




<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>خدمات البوابة</h4>
      </div>
       <div class="row director-pg">
           @foreach($gates as $gate)
           <div class="col-md-4 col-6">
               <div class="img-com">
                   <a href="#"><img style="width:30%;height:100px;" src="{{asset('images/servgate/'.$gate->image)}}"></a>
               </div>
               <h5><a href="#">{{ $gate->name }}</a></h5>
           </div>
           @endforeach


       </div>
    </div>
</div>
@endsection
