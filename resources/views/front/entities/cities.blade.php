@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show entit-bg">
    <h2>المراكز والمدن</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> كيانات المحافظة</a> &#124; <a href="Centers-cities.html"> المراكز والمدن</a></p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>المراكز والمدن</h4>
      </div>
      <div class="row">
           <div class="col-md-2"></div>

           <div class="col-md-8 text-center">


            <select name="name" id="name">
                @foreach($entities as $entity)
                    <option value="{{ $entity->id }}">{{$entity->name}}</option>
                @endforeach
                </select>

                </div>

                <div class="col-md-2"></div>

                    <div class="col-md-12 text-center">
                        <img src="{{ asset('images/city/'.$entity->image)}}" width="75%">
                    </div>

      </div>

    </div>
</div>


@endsection
