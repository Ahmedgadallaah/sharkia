<!--START HEADER-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="index.html"><img src="{{url('delta/imgs/logo.png')}}" width="170"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item dropdown menu-area">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Export <i class="far fa-caret-square-down"></i>
          </a>
          <div class="dropdown-menu mega-area" aria-labelledby="mega-one">
             <div class="container">
              <div class="row">

                  <?php $categories = App\Category::all(); ?>
                  @foreach($categories as $category)
                  @if($loop->iteration % 2 == 0)
                  <div class="col-md-2 col-6">
                      <h6><a href="{{URL::to('category/'.$category->id)}}"><img src="{{asset('images/'.$category->image)}}" width="30"> {{ $category->name }}</a></h6>
                      @endif
                      <ul>
                        <?php $products = App\Product::where('category_id',$category->id)->get(); ?>
                        @foreach($products as $product)
                          <li><a href="{{URL::to('product/'.$product->id)}}">{{ $product->name }}</a></li>
                        @endforeach
                        </ul>
                      @endforeach
                  </div>

              </div>
              </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="import.html">Import</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="season-calander.html">Seasons Calander</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#partner">Partner</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          <li class="nav-item">

        @if ( Config::get('app.locale') == 'en')
        <a class="dropdown-item" href="{{ url('lang/ar') }}">AR</a>
    @elseif ( Config::get('app.locale') == 'ar' )
        <a class="dropdown-item" href="{{ url('lang/en') }}">الإنجليزية</a>
    @endif

            </li>
      </ul>

    </div>
  </nav>
