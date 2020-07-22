<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <title>محافظة الشرقية - SHARKIA</title>
    <link rel="icon" href="{{asset('imgs/logo-o.jpg')}}" type="image/png"/>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Reem+Kufi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&display=swap" rel="stylesheet">
</head>
<body>
   <!--************************************************-->
<div class="uper-head">
<div class="row">
    <div class="col-md-4 text-right">
        <ul>
            <li title="التاريخ"> <i class="far fa-calendar-alt"></i>  السبت 12 يونيو 2020، 02:25:03 مساءً </li>
        </ul>
    </div>
    <div class="col-md-4 text-center">
        <p id="type"></p>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-10 col-12">
                <form class="form-inline my-2 my-lg-0">
                   <input class="mr-sm-2" type="search" placeholder="أبحث" aria-label="Search" title="ابحث">
                   <button class="search-btn" type="submit"><i class="fas fa-search" title="ابحث"></i></button>
                </form>
            </div>
            <div class="col-md-2 col-2 lang">
                <ul>
                    <li title="اللغة الأنجيليزية"><a href="#">English</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>




<!--  start Social Media in side -->
<div class="icons wow flash">
    <i class="fas fa-angle-left"></i>
     <ul>
         <a href="https://www.facebook.com/sharkiaportal" title="فيسبوك">
             <li class="facebook"><img src="imgs/facebook.png" width="40"></li>
         </a>
         <a href="https://www.youtube.com/sharkiaportal" target="_blank" title="يوتيوب">
             <li><img src="imgs/youtube.png" width="40"></li>
         </a>
         <a href="https://twitter.com/sharkiaportal" target="_blank" title="تويتر">
             <li><img src="imgs/twitter.png" width="40"></li>
         </a>
         <a href="http://ema.gov.eg/" target="_blank" title="حالة الطقس">
             <li><img src="imgs/watherview.png" width="40"></li>
         </a>
         <a href="" target="_blank" title="مواقيت الصلاة" data-toggle="modal" data-target="#prayModal">
             <li><img src="imgs/praytime.png" width="40" class="pray"></li>
         </a>
     </ul>
   </div>
   <!--  PRAY ICON MODEL NOUR ELDIEN -->
   <div class="icon-modal">
       <div class="modal fade" id="prayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <br><br>
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body">
            <img src="imgs/pray-time.jpg" width="100%">
         </div>
       </div>
     </div>
   </div>
   </div>
    {{-- @if ( Config::get('app.locale') == 'ar' )

    <link rel="stylesheet" href="{{url('delta/css/ar.css')}}">


    @endif --}}
