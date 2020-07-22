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
         <h4>السياحة الدينية</h4>
      </div>
       <div class="row">
          <div class="col-md-12">

            {{$relegion->description}}
            {{-- <h6>يقع في محافظة الشرقية ثلاثة طرق تاريخية دينية مما يضيف الى الشرقية عراقة واصالة ومنها:</h6>
              <ul>
                  <li>وصل سيدنا يوسف عليه السلام إلى مصر بعد أن رماة إخوته في الجب فى الصحراء مع قافلة إلى مصر فى عهد الهكسوس وأقام فى المكان الذى كان يطلق عليه في ذلك الوقت صوعن "صان الحجر " حالياً حيث وصل على مكانة مرموقة " قال ربى اجعلني على خزائن الأرض إنى حفيظ عليم " صدق الله العظيم .</li>
                  <li>ولد سيدنا موسى عليه السلام فى مدينة برعمسيس فى عهد حكم رمسيس الثاني وقاد خروج اليهود من مصر حيث بدء من قنتير إلى مسقط الصالحية حالياً ومنها إلى تل الفرعونية شرق القنطرة حالياً ومنها إلى تل أبى صيفا داخل سيناء هربا من بطش فرعون مصر كما جاء في التوراة </li>
                  <li> كانت الشرقية طريقاً لسير العائلة المقدسة عند مجيئها على مصر هرباً من بطش "هيرودوس " حيث اتجهت من الفرما شمال سيناء إلى الشرقية مروراً بوادي طميلات قرب الحسينية ومنها إلى تل المسخوطة ثم إلى قنتير حالياً ثم إلى صفط الحنة منها إلى تل بسطة </li>
              </ul> --}}

          </div>
          <br>
          @foreach($relegions as $relegion)
           <div class="col-md-6 text-center">
              <br>
               <a href="mus-toursim.html"><img src="{{ asset('images/relitem/'.$relegion->image)}}" width="70%"></a>
           </div>
          @endforeach
       </div>
    </div>
</div>

@endsection