@extends('admin.index')
@section('content')

<div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <p></p>
            <h3>{{ trans('message.settings') }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url ('/admin/setting') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <p><p></p> </p>
            <h3>{{ trans('message.categories') }}</h3>

              <p></p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url ('/admin/category') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <p></p>
            <h3>{{ trans('message.partners') }}</h3>

            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url ('/admin/partner') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

            <p>{{ trans('message.products') }}</p>
            <h3>{{ trans('message.products') }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url ('/admin/product') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <p></p>
            <h3>{{ trans('message.contacts') }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url ('/admin/contact') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <p></p>
            <h3>{{ trans('message.sliders') }}</h3>
          </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url ('/admin/slider') }}" class="small-box-footer">{{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <p></p>
            <h3>{{ trans('message.social') }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url ('/admin/slink') }}" class="small-box-footer"> {{ trans('message.go') }} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

</div>

@endsection
