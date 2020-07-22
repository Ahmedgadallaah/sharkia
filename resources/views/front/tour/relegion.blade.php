@extends('index')
@section('content')

<div class="banner-show relig-bg">
    <h2>السياحة الدينية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="relig-tourism.html">السياحة الدينية</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>{{ $relegion->name }}</h4>
      </div>
       <div class="row">
           <div class="col-md-12">
            {{$relegion->description}}
            {{-- <p>كانت الشرقية المعبر الذى سلكه جنود الاسلام بقيادة عمرو بن العاص عند فتح مصر وفى بلبيس تم بناء اول جامع فى مصر والقارة الإفريقية وهو جامع سادات قريش. بعد استشهاد سيدنا الحسين رضوان الله عليه غادرت السيدة زينب رضى الله عنها من المدينة المنورة إلى مصر لكي تقيم فيها بين المصرين الذين عرف عنهم حبهم وتقديرهم لآل البيت الكرام وسارت برفقتها السيده فاطمة النبوية والسيدة سكينة إبنة الإمام الحسين رضوان الله عليهم . فوصلن الى بلدة العباسة إحدى قرى مركز ابوحماد، مع بزوغ هلال شهر شعبان عام 61 هـ  ومنها اتجهن إلى الفسطاط. وبذلك تكون قد شرفت وازدات تعظيماً بمرور آل البيت بها عند قدومهم إلى مصر .</p> --}}
           </div>
       </div>
    </div>
</div>

@endsection