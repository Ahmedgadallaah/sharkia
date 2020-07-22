@extends('index')
@section('content')

<div class="banner-show sta-ifno">
    <h2>النـــــشــــرات الشــــهــــرية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">  إحصائيات ومعلومات  </a> &#124; <a href="Informational-map.html">النشرات الشهرية</a> </p>
    </div>
</div>
@include('layouts.mission')

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>النـــــشــــرات الشــــهــــرية</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">
            <select name="name" id="#month" onchange="getValue(this);">
                <option value="">من فضلك أختار القطاع الخاص بالمؤشر</option>
                @foreach($months as $month)
                   <option value="{{$month->id }}">{{$month->name }}</option>
                   @endforeach
               </select>


               <div class="month"></div>
           </div>

       </div>
    </div>
</div>


<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({
                url: "{{route('month')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.month').html(result);
                 }
            });
        }
</script>
@endsection
