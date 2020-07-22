@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show news-bg">
    <h2>وزراء في الشرقية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="Representatives-Meetings.html">وزراء في الشرقية</a></p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>وزراء في الشرقية</h4>
      </div>
      <div class="row">
          <div class="col-md-12">
              <h6>عنوان الخبر:</h6> <span>{{ $media->name }}</span>
          </div>
          <div class="col-md-12">
              <h6>تاريخ اللقاء:</h6> <span>{{ $media->date }}</span>

          </div>
          <div class="col-md-12 text-center">
                <!--              <img src="imgs/amlak-eldola.jpg" width="70%" class="img-thumbnail img-responsive">-->
                 <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($media->gallery as $image)
                            <div class="swiper-slide">
                            <div class="imgbx">

                                <img src="{{asset('images/media_ministers/'.$image->images)}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                 </div>
          </div>
          <div class="col-md-12">
            {{ $media->description }}
          </div>
      </div>

    </div>
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
