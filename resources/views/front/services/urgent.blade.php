@extends('index')
@section('content')

<div class="banner-show emerg-bg">
    <h2>خدمات الطوارئ</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> الخدمات </a> &#124; <a href="emergency-serv.html"> خدمات الطوارئ </a> </p>
    </div>
</div>
@include('layouts.mission')





<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>دليل الطوارئ</h4>
      </div>
       <div class="row text-center emerg">
           @foreach($urgents as $urgent)
            <div class="col-md-6 col-6">
                <h5>{{ $urgent->name }}</h5>
            </div>
            <div class="col-md-6 col-6">
                <h5>{{ $urgent->description }}</h5>
            </div>
          @endforeach
       </div>
    </div>
</div>

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>رؤســاء أقســام المــرور بالمحــافظــة</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">

            <select name="name" id="#traffics" onchange="getValue(this);">
                @foreach($traffics as $traffic)
               <option value="{{ $traffic->id }}">{{ $traffic->name }}</option>
                  @endforeach
               </select>
               <div class="traffics"></div>
           </div>





       </div>
    </div>
</div>

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>دلـيل أرقــام تلـيفونات المـستشفيات بالمــحافظــة</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">

            <select name="name" id="#healths" onchange="healthValue(this);">
                @foreach($healths as $health)
               <option value="{{ $health->id }}">{{ $health->name }}</option>
                  @endforeach
               </select>
               <div class="health"></div>

           </div>


       </div>
    </div>
</div>

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>أرقــام مكاتب الصـحـف القـومـية بالمحــافظــة</h4>
      </div>
       <div class="row emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6 text-center">

            <select name="name" id="#papers" onchange="paperValue(this);">
                <option >اختر</option>
                @foreach($papers as $paper)
               <option value="{{ $paper->id }}">{{ $paper->name }}</option>
                  @endforeach
               </select>
               <div class="paper"></div>

            </div>


       </div>
    </div>
</div>




<script type="text/javascript">
    function getValue(x) {
            var value = x.value;
      $.ajax({
                url: "{{route('traffic')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {
                     $('.traffics').html(result);
                 }
            });
        }

        function healthValue(x) {
            var value = x.value;
        $.ajax({
                url: "{{route('health')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.health').html(result);
                 }
            });
        }

        function paperValue(x) {
            var value = x.value;
        $.ajax({
                url: "{{route('paper')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.paper').html(result);
                 }
            });
        }
</script>

@endsection
