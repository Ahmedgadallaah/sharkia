@extends('index')
@section('content')

<div class="banner-show sta-ifno">
    <h2>التقســــيم الإدارى</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">  إحصائيات ومعلومات  </a> &#124; <a href="Administrative-division.html">التقســــيم الإدارى</a> </p>
    </div>
</div>
@include('layouts.mission')

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>التقســــيم الإدارى لمحــافــظــة الشـــــر قيـــــة</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">
            <select name="name" id="#manage" onchange="getValue(this);">
                <option value="">من فضلك أختار القطاع الخاص بالمؤشر</option>
                @foreach($manages as $manage)
                   <option value="{{$manage->id }}">{{$manage->name }}</option>
                   @endforeach
               </select>


               <div class="manage"></div>
           </div>

       </div>
    </div>
</div>

<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({
                url: "{{route('manage')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.manage').html(result);
                 }
            });
        }
</script>

@endsection
