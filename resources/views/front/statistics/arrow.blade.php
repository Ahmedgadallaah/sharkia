@extends('index')
@section('content')

<div class="banner-show sta-ifno">
    <h2>المـؤشـــرات الإحصـــائية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">  إحصائيات ومعلومات  </a> &#124; <a href="Informational-map.html"> المـؤشـــرات الإحصـــائية</a> </p>
    </div>
</div>
@include('layouts.mission')


<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>المـؤشـــرات الإحصـــائية</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">


            <select name="name" id="#arrow" onchange="getValue(this);">
                <option value="">من فضلك أختار القطاع الخاص بالمؤشر</option>
                @foreach($arrows as $arrow)
                   <option value="{{$arrow->id }}">{{$arrow->name }}</option>
                   @endforeach
               </select>


               <div class="arrow"></div>
           </div>



       </div>
    </div>
</div>

<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({

                url: "{{route('arrow')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.arrow').html(result);
                 }


            });


        }
</script>
@endsection
