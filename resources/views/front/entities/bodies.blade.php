@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show entit-bg">
    <h2>الهيئات </h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> كيانات المحافظة </a> &#124; <a href="Organizations.html">الهيئات </a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>الهـيـئــات</h4>
      </div>
       <div class="row director-pg">
            @foreach($entities as $entity)
                <div class="col-md-4 col-6">

                    <div class="img-com">
                        <a href="Road-bridg-orag.html"><img src="{{ asset('images/body/'.$entity->image)}}"></a>
                    </div>
                    <h5><a href="Road-bridg-orag.html">{{$entity->name}}</a></h5>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
