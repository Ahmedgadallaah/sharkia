@extends('index')
@section('content')

<div class="banner-show mus-bg">
    <h2>المتــاحــف</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="musium.html">المتــاحــف</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>المتاحف</h4>
      </div>
       <div class="row">
           @foreach($museums as $museum)
           <div class="col-md-4">
               <h6>{{ $museum->name }}</h6>
                <a href=""><img src="{{ asset('images/museum/'.$museum->image)}}" width="70%"></a>
            </div>
           @endforeach
       </div>
    </div>
</div>
@endsection
