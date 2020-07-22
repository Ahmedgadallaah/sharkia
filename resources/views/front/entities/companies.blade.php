@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show entit-bg">
    <h2>الشركات</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> كيانات المحافظة </a> &#124; <a href="Companies.html">الشركات </a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>الــشـــركــات</h4>
      </div>
       <div class="row director-pg">
            @foreach($entities as $entity)
                <div class="col-md-4 col-6">
                    <div class="img-com">
                        <a href="#"><img src="{{ asset('images/company/'.$entity->image)}}"></a>
                    </div>
                    <h5><a href="#">{{ $entity->name}}</a></h5>
                </div>
            @endforeach
       </div>
    </div>
</div>

@endsection
