<header class="main-header">
    <!-- Logo -->
    <a href="{{ URL::to('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Delta</b>Deals</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Delta Deals</b></span>
    </a>



    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Sidebar toggle button-->


<div class="dropdown">
           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @guest

                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))

                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>

                        @endif
                    @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                        @endguest


                        @if ( Config::get('app.locale') == 'en')
                        <a class="dropdown-item" href="{{ url('lang/ar') }}">AR</a>
                    @elseif ( Config::get('app.locale') == 'ar' )
                        <a class="dropdown-item" href="{{ url('lang/en') }}">الإنجليزية</a>
                    @endif

        </div>
</div>

      @include('admin.layouts.menu')
    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/design/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
        </div>

      </div>


      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">{{ trans('message.dashboard') }}</li>


        <li class="treeview">
            <a href="#">
              <span>{{trans('message.governorate leaders')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

                {{-- <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                  <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    </ul>
                  </li>
                </ul> --}}

              <li><a href="{{url::to('admin/employee')}}"><i class="fa fa-circle-o"></i> {{trans('message.governorate leaders')}}</a></li>
              <li><a href="{{url::to('admin/governer')}}"><i class="fa fa-circle-o"></i> {{trans('message.Former governors')}}</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <span>{{trans('message.governorate Entities')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url::to('admin/city')}}"><i class="fa fa-circle-o"></i> {{trans('message.centers and cities')}}</a></li>
              <li><a href="{{url::to('admin/body')}}"><i class="fa fa-circle-o"></i> {{trans('message.bodies')}}</a></li>
              <li><a href="{{url::to('admin/directorate')}}"><i class="fa fa-circle-o"></i> {{trans('message.directorates')}}</a></li>
              <li><a href="{{url::to('admin/company')}}"><i class="fa fa-circle-o"></i> {{trans('message.companies')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a href="#">
              <span>{{trans('message.Media corner')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url::to('admin/media_governer')}}"><i class="fa fa-circle-o"></i> {{trans('message.Governor and Representatives Meetings')}}</a></li>
              <li><a href="{{url::to('admin/media_media')}}"><i class="fa fa-circle-o"></i> {{trans('message.Eastern in the eyes of the press')}}</a></li>
              <li><a href="{{url::to('admin/media_minister')}}"><i class="fa fa-circle-o"></i> {{trans('message.Eastern ministers')}}</a></li>
              <li><a href="{{url::to('admin/media_person')}}"><i class="fa fa-circle-o"></i> {{trans('message.Encounters of citizens')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a href="#">
              <span>{{trans('message.investments')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url::to('admin/section')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment section')}}</a></li>
              <li><a href="{{url::to('admin/chance')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment chances')}}</a></li>
              <li><a href="{{url::to('admin/map')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment map')}}</a></li>
              <li><a href="{{url::to('admin/role')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment roles')}}</a></li>

              <li class="treeview">
                        <a href="#">
                        <span>{{trans('message.investment egyptian map')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url::to('admin/egyptmap')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment egyptian map')}}</a></li>
                            <li><a href="{{url::to('admin/egypttitle')}}"><i class="fa fa-circle-o"></i> {{trans('message.investment egyptian map Details')}}</a></li>
                        </ul>
                    </li>


              <li><a href="{{url::to('admin/devmap')}}"><i class="fa fa-circle-o"></i> {{trans('message.republic development map')}}</a></li>
              <li><a href="{{url::to('admin/guide')}}"><i class="fa fa-circle-o"></i> {{trans('message.constructions companies guide')}}</a></li>


              <li class="treeview">
                <a href="#">
                <span>{{trans('message.Industrial areas and cities')}}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url::to('admin/area')}}"><i class="fa fa-circle-o"></i> {{trans('message.Industrial areas and cities')}}</a></li>
                    <li><a href="{{url::to('admin/areatitle')}}"><i class="fa fa-circle-o"></i> {{trans('message.Industrial areas and cities details')}}</a></li>
                      </ul>
            </li>






            {{-- ///////////// --}}












      </ul>

      <li class="treeview">
        <a href="#">
          <span>{{trans('message.tourism')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url::to('admin/antique')}}"><i class="fa fa-circle-o"></i> {{trans('message.Archeology tourism')}}</a></li>
          <li><a href="{{url::to('admin/desert')}}"><i class="fa fa-circle-o"></i> {{trans('message.Desert tourism')}}</a></li>
          <li><a href="{{url::to('admin/conference')}}"><i class="fa fa-circle-o"></i> {{trans('message.Conference tourism')}}</a></li>

          <li class="treeview">
            <a href="#">
            <span>{{trans('message.Relegion tourism')}}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url::to('admin/relegion')}}"><i class="fa fa-circle-o"></i> {{trans('message.Relegion tourism')}}</a></li>
                <li><a href="{{url::to('admin/relitem')}}"><i class="fa fa-circle-o"></i> {{trans('message.Relegion tourism Detail')}}</a></li>
            </ul>
          </li>


          <li class="treeview">
                    <a href="#">
                    <span>{{trans('message.countryside tourism')}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url::to('admin/countryside')}}"><i class="fa fa-circle-o"></i> {{trans('message.countryside tourism')}}</a></li>
                        <li><a href="{{url::to('admin/cside')}}"><i class="fa fa-circle-o"></i> {{trans('message.countryside tourism Detail')}}</a></li>
                    </ul>
                </li>


          <li><a href="{{url::to('admin/museum')}}"><i class="fa fa-circle-o"></i> {{trans('message.mueseum')}}</a></li>
          <li><a href="{{url::to('admin/sport')}}"><i class="fa fa-circle-o"></i> {{trans('message.sport tourism')}}</a></li>









    </ul>
        </li>

      <li class="treeview">
        <a href="#">
          <span>{{trans('message.statistics')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    <ul class="treeview-menu">
          <li><a href="{{url::to('admin/arrow')}}"><i class="fa fa-circle-o"></i> {{trans('message.The most important indicators')}}</a></li>
          <li><a href="{{url::to('admin/month')}}"><i class="fa fa-circle-o"></i> {{trans('message.Monthly releases')}}</a></li>
          <li><a href="{{url::to('admin/people')}}"><i class="fa fa-circle-o"></i> {{trans('message.Population')}}</a></li>
          <li><a href="{{url::to('admin/smap')}}"><i class="fa fa-circle-o"></i> {{trans('message.Informational map')}}</a></li>
          <li><a href="{{url::to('admin/description')}}"><i class="fa fa-circle-o"></i> {{trans('message.country description')}}</a></li>
          <li><a href="{{url::to('admin/manage')}}"><i class="fa fa-circle-o"></i> {{trans('message.Administrative division')}}</a></li>

    </ul>
    </li>
    <li class="treeview">
        <a href="#">
          <span>{{trans('message.services')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    <ul class="treeview-menu">
          <li><a href="{{url::to('admin/servgate')}}"><i class="fa fa-circle-o"></i> {{trans('message.GateWay services')}}</a></li>
          <li><a href="{{url::to('admin/servguide')}}"><i class="fa fa-circle-o"></i> {{trans('message.Guide service')}}</a></li>
          <li><a href="{{url::to('admin/servurgent')}}"><i class="fa fa-circle-o"></i> {{trans('message.urgent Service')}}</a></li>
    </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <span>{{trans('message.about sharkia')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    <ul class="treeview-menu">
          <li><a href="{{url::to('admin/shaline')}}"><i class="fa fa-circle-o"></i> {{trans('message.sharkia in lines')}}</a></li>
          <li><a href="{{url::to('admin/shamap')}}"><i class="fa fa-circle-o"></i> {{trans('message.sharkia antique Map ')}}</a></li>
          <li><a href="{{url::to('admin/shafeast')}}"><i class="fa fa-circle-o"></i> {{trans('message.Sharkia national Feast')}}</a></li>
          <li><a href="{{url::to('admin/shaphoto')}}"><i class="fa fa-circle-o"></i> {{trans('message.sharkia photos')}}</a></li>
          <li><a href="{{url::to('admin/shacelebrate')}}"><i class="fa fa-circle-o"></i> {{trans('message.Sharkia Celebrate')}}</a></li>



          <li class="treeview">
            <a href="#">
              <span>{{trans('message.sharkia Flags')}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
              <li><a href="{{url::to('admin/shaflagcat')}}"><i class="fa fa-circle-o"></i> {{trans('message.sharkia flag category')}}</a></li>
              <li><a href="{{url::to('admin/shaflag')}}"><i class="fa fa-circle-o"></i> {{trans('message.sharkia flag')}}</a></li>





        </ul>
        </li>


    </ul>
    </li>
    </section>
    <!-- /.sidebar -->
  </aside>
