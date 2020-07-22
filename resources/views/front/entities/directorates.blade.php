@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show entit-bg">
    <h2>المديريات</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> كيانات المحافظة </a> &#124; <a href="directorates.html">المديريات </a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->

<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>مــديــريـات الخــدمـــات</h4>
      </div>
      @foreach($entities as $entity)
            <div class="row director-pg">
                <div class="col-md-4 col-6">
                    <div class="img-com">
                    <a href="#"><img src="{{ asset('images/directorate/'.$entity->image) }}"></a>
                    </div>
                <h5><a href="#">{{ $entity->name }}</a></h5>
                </div>
            </div>
      @endforeach
    </div>
</div>
@endsection
