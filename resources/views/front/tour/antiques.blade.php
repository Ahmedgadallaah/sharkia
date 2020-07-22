@extends('index')
@section('content')

<div class="banner-show tourism-bg">
    <h2>السياحة الأثرية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="arc-tourism.html">السياحة الأثرية</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="contact-form">
    <div class="container">
        <div class="contact-presentation">
            <div class="row">
                <div class="col-md-2">
                    <img src="imgs/logo.png" width="150">
                </div>
                <div class="col-md-10">
                    <p>تزهو محافظة الشرقية بالثروات الاثرية والإمكانات السياحية المتعددة والتى تنفرد دون غيرها من محافظات الوجه البحرى حيث ينتشر من بين ربوعها مائة وعشرين موقع أثرى وأشهرهم منطقتى تل بسطة – وصان الحجر .</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="sh-rows-info">
        <div class="container">
          <div class="text-center upper-show">
             <h4>السياحة الأثرية</h4>
          </div>
           <div class="row">
              @foreach($antiques as $antique  )
                <div class="col-md-6">
                  <h6>{{ $antique->name }}<span></span></h6>
                   <a href=""><img src="{{ asset('images/antique/'.$antique->image)}}" width="70%"></a>
               </div>
              @endforeach
           </div>
        </div>
    </div>
@endsection
