@extends('index')
@section('content')

<div class="banner-show sta-ifno">
    <h2>الخريطـــــة المعلوماتيـــــــة</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">  إحصائيات ومعلومات  </a> &#124; <a href="Informational-map.html"> الخريطة المعلوماتية </a> </p>
    </div>
</div>
@include('layouts.mission')


<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>الخريطـــــة المعلوماتيـــــــة</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <select name="name" id="#smaps" onchange="getValue(this);">
                @foreach($maps as $map)
               <option value="{{ $map->id }}">{{ $map->name }}</option>
                  @endforeach
               </select>
           </div>
           <div class="col-md-3"></div>
           <div class="col-md-12 text-center">
              <p>مصدر البيانات : مركز المعلومات و دعم إتخاذ القرار</p>

              <div class="smaps"></div>

              {{-- <img src="imgs/zra3a-map.jpg"> --}}

            </div>

       </div>
    </div>
</div>

<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({

                url: "{{route('stmap')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.smaps').html(result);
                 }


            });


        }
</script>

@endsection
