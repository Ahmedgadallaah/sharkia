@extends('index')
@section('content')

<div class="banner-show desesrt-bg">
    <h2>السياحة الصحراوية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="desert-tourism.html">السياحة الصحراوية</a> </p>
    </div>
</div>

@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>السياحة الصحراوية</h4>
      </div>
       <div class="row">
          <div class="col-md-12">
              <p>يقع فى نطاق المحافظة مساحات صحراوية شاسعة تعمل على جذب الكثير من محبى سياحة المغامرات (السفارى ) وسباقات السيارات والدراجات البخارية وإقامة مضمار كبير لسباقات الخيل والهجن .</p>
          </div>
          @foreach($deserts as $desert)
          <div class="col-md-6">
              <h6>{{ $desert->name }}</h6>
               <a href=""><img src="{{ asset('images/desert/'.$desert->image)}}" width="70%"></a>
           </div>
          @endforeach
       </div>
    </div>
</div>
@endsection
