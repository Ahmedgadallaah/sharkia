@extends('index')
@section('content')

<div class="banner-show sta-ifno">
    <h2>التعداد الســكـــــــاني</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">  إحصائيات ومعلومات  </a> &#124; <a href="Population.html">تعداد السكان</a> </p>
    </div>
</div>
@include('layouts.mission')


<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>التعداد الســكـــــــاني</h4>
      </div>
       <div class="row text-center emerg">
           <div class="col-md-3"></div>
           <div class="col-md-6">
                <select name="name" id="#people" onchange="getValue(this);">
                    <option value="">من فضلك أختار القطاع الخاص بالمؤشر</option>
                    @foreach($peoples as $people)
                    <option value="{{$people->id }}">{{$people->name }}</option>
                    @endforeach
                </select>


                <div class="people"></div>
           </div>

       </div>
    </div>
</div>



<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({
                url: "{{route('people')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.people').html(result);
                 }
            });
        }
</script>
@endsection
