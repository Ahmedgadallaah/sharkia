@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>دليل شركات المقاولات</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> الأستثمار </a> &#124;<a href="Contracting-companies-directory.html">دليل شركات المقاولات</a></p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>دليل شركات المقاولات</h4>
      </div>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 text-center">
                      <select name="name" id="#map" onchange="getValue(this);">
                <option value="">من فضلك أختار القطاع الخاص بالمؤشر</option>
                @foreach($titles as $title)
                <option value="{{$title->id }}">{{$title->city }}</option>
                @endforeach
            </select>

           </div>
           <div class="title"></div>
          <div class="col-md-2"></div>
      </div>
    </div>
</div>


<script type="text/javascript">
    function getValue(x) {
            var value = x.value;

      $.ajax({
                url: "{{route('invguide')}}",
                method: "GET",
                data: {value: value},
                success: function (result) {

                     $('.title').html(result);
                 }
            });
        }
</script>
@endsection
