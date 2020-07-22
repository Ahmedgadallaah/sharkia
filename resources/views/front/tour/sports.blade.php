@extends('index')
@section('content')

<div class="banner-show sports-bg">
    <h2>السياحة الرياضية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="sports-tourism.html">السياحة الرياضية</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>السياحة الرياضية</h4>
      </div>
       <div class="row">
           <div class="col-md-12"><h6>تتنوع صناعة السياحة الرياضية على أرض الشرقية وتتعدد منتجاتها غير التقليدية وتنفرد بميزة نسبية مرتفعة القيمة.</h6>
           <br> <br></div>
           @foreach($sports as $sport)
           <div class="col-md-4">
               {{-- <h6>{{ $museum->name }}</h6> --}}
                <a href=""><img src="{{ asset('images/sport/'.$sport->image)}}" width="70%"></a>
            </div>
           @endforeach




       </div>
    </div>
</div>
@endsection
