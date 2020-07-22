@extends('index')
@section('content')


@include('layouts.mission')

<div class="banner-show sta-ifno">
    <h2>خريطة الموقع</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href=""> إحصائيات ومعلومات </a> &#124; <a href="Description-village.html"> وصـف القـريــة </a> </p>
    </div>
</div>
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>وصـــــف القــــريــــة</h4>
      </div>
       <div class="row director-pg">
           @foreach($descriptions as $description)
           <div class="col-md-4 col-6">
               <div class="img-com">
                   <a href=""><img src="{{asset('images/description/'.$description->image)}}"></a>
               </div>
               <h5><a href="">{{$description->name}}</a></h5>
           </div>
           @endforeach
       </div>
    </div>
</div>
@endsection
