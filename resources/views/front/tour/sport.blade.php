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
         <h4>{{ $sport->name }}</h4>
      </div>
       <div class="row">
           <div class="col-md-12">
            {{$sport->description}}
            {{-- <li>فريق الشرقية للهوكي هو من اعرق فرق الهوكى في مصر وأفريقيا وقد حقق انجازات قياسية حيث يحتل فريق الشرقية للهوكي مكان الصدارة في عدد البطولات التي حققها على مستوى القارة الأفريقية وصلت إلى 20 بطولة أفريقية، وهو الإنجاز الرياضي القياسي الذي تسجله الموسوعات الرياضية العالمية  بكل الفخر والاعزاز الموسوعات الرياضية العالمية وان هذة البطولات تعد مقوما ومنتجا سياحيا .</li> --}}
           </div>
       </div>
    </div>
</div>
@endsection
