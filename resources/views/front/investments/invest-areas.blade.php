@extends('index')
@section('content')

<div class="banner-show investment-bg">
    <h2>المنـــاطــق و المدن الصـــناعـــية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">الأستثمار</a> &#124; <a href="Industrial-areas.html">المناطـق و المدن الصـناعـية</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>المنـــاطــق و المدن الصـــناعـــية</h4>
      </div>
       <div class="row">
        @foreach($titles as $title )
         <div class="col-md-6">

             <h6>{{ $title->name }}</h6>
             <div class="row">
                 @foreach($title->areatitle as $image)
                 <div class="col-md-12"><a href="belbies.html"><img src="{{asset('images/areatitle/'.$image->image)}}" width="70%"></a></div>
                 @endforeach
                </div>
         </div>
        @endforeach
       </div>
    </div>
</div>
@endsection
