@extends('index')
@section('content')


<!-- ********************************************************** -->
<div class="banner-show investment-bg">
    <h2>المحافظون السابقون</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#">المحافظون السابقون</a> &#124; <a href="Governor-cv.html">المحافظون السابقون</a> </p>
    </div>
</div>
@include('layouts.mission')
<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>المحافظون السابقون</h4>
      </div>
        <div class="row">

            @foreach($governers as $governer)
                <div class="col-md-3 col-6">
                    <div class="instructor-pane">
                        <a class="popup-with-move-anim" href="#{{$governer->name}}">
                            <div class="instructor-image">
                                <img class="img-responsive img-rounded" src="{{asset('images/governer/'.$governer->image)}}" width="100%" alt="instructor">
                                <div class="hover-overlay">
                                    <img src="{{asset('images/governer/'.$governer->image)}}" width="25px" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="instructor-info text-center">
                            <a class="popup-with-move-anim" href="#instructor-1">
                                <h5>{{$governer->name}}</h5>
                                <p>{{$governer->date}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

         <nav aria-label="Page navigation example">
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
        </nav>
    </div>
</div>

@endsection
