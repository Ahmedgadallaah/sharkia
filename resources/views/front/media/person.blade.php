@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show news-bg">
    <h2>لقاءات المواطنين</h2>
    <div>
        <p><a href="index.html">الرئيسية</a> &#124; <a href="#">الركن الأعلامى</a> &#124; <a href="Representatives-Meetings.html">لقاءات المواطنين</a></p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
        <div class="text-center upper-show">
             <h4>لقاءات المواطنين</h4>
          </div>
     <div class="row">
       <div class="col-md-12 text-center">
           <h6>أعداد وتصميم :</h6>
           <span>البوابة اللألكترونية</span>
           <br><br>
       </div>
       @foreach( $medias as $media)
        <div class="col-md-6">
            <div class="blog-post">
                <div class="row">
                    <div class="col-md-4 col-4 blog-post-img"><img src="{{asset('images/media_person/'.$media->image)}}" width="100%"></div>
                    <div class="col-md-8 col-8">
                        <span>{{ $media->date }}</span>
                        <p class="blog-post-text">{{ $media->name }}</p>
                        <a href="{{ URL::to('media-persons/'.$media->id) }}" class="blog-post-cta">معرفة المزيد</a>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
    </div>
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            </ul>
        </nav> --}}
    </div>
</div>
@endsection
