

<!--  start Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <img src="{{asset('delta/imgs/logo.png')}}" width="150">
                <p>Export and import company Garden fresh organic vegetables and fruits from premium gardens</p>
                <h6>FOLLOW US</h6>


                <div class="footer-social">
                    <?php  $slinks =App\Slink::with('social')->get(); ?>
                    @foreach($slinks as  $slink)
                    <a href="{{$slink->link}}"><i class="fab fa-{{$slink->link}}"></i></a>
                   @endforeach
                </div>
            </div>
            <div class="col-md-4 col-12">
                <h6>QUICKLINKS</h6>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <ul>
                            <li><a href="{{url('/about')}}">About</a></li>
                            <li><a href="{{url('/fruits')}}">New furits</a></li>
                            <li><a href="{{url('/citrus')}}">Citrus</a></li>
                            <li><a href="{{url('/')}} #partner">Our Partners</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-6">
                        <ul>
                            <li><a href="{{url('/vegetables')}}">Vegtables</a></li>
                            <li><a href="{{url('/seeds')}}">Seeds store</a></li>
                            <li><a href="{{url('/')}} #services">Services</a></li>
                            <li><a href="{{url('/contact')}}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h6>INFORMATION</h6>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <ul>
                            <?php $settings=App\Setting::all() ?>
                            @foreach($settings as $setting)
                            <li>Address:{{$setting->address_1}}</li>
                            <li>Address:{{$setting->address_2}}</li>
                            @endforeach
                            <?php $infos=App\Info::limit(2)->get(); ?>
                            @foreach($infos as $info)
                            <li>Phone : {{ $info->mobile}}</li>
                            @endforeach
                            @foreach($infos as $info)
                            <li>Email: {{ $info->email}} </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <div class="copyright text-center">
    <div class="container">
        Copyright © 2020 - Delta deal - All rights reserved.
    </div>
    </div>






    <!-- jp footer Wrapper End -->
    <script src="{{url('delta/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('delta/js/popper.min.js')}}"></script>
    <script src="{{url('delta/js/bootstrap.min.js')}}"></script>
    <script src="{{url('delta/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('delta/js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{url('delta/js/wow.min.js')}}"></script>

    <script src="{{url('delta/js/main.js')}}"></script>






    <script src="js/main.js"></script>

    <script>
        $(function() {
            $('select[name=category_id]').change(function() {

                var url = '{{ url('category') }}' + $(this).val() + '/product_id/';

                $.get(url, function(data) {
                    var select = $('form select[name=product_id]');

                    select.empty();

                    $.each(data,function(key, value) {
                        select.append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                });
            });
        });
    </script>
</body>
</html>
