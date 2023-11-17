<section id="top">
    <div class="container">
        <div class="row">
            <div class="top_1 clearfix">
                <div class="col-sm-3">
                    <div class="top_1l clearfix">
                        <h2 class="mgt big"><a class="col_1" href="{{ url('/') }}"></i><span class="col_4"
                                    style="font-size: 25px;">{{ $setting->company_name }}</span></a>
                        </h2>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="top_1r clearfix">
                        <div class="col-sm-4 space_left">
                            <div class="top_1ri clearfix">
                                <span><i class="fa fa-phone"></i></span>
                                <h5 class="mgt col_4">CALL US</h5>
                                <h6 class="col_4">{{ $setting->phone }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-4 space_left">
                            <div class="top_1ri clearfix">
                                <span><i class="fa fa-envelope"></i></span>
                                <h5 class="mgt col_4">EMAIL US</h5>
                                <h6 class="col_4">{{ $setting->email }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-4 space_left">
                            <div class="top_1ri clearfix">
                                <span><i class="fa fa-map-marker"></i></span>
                                <h5 class="mgt col_4">ADDRESS</h5>
                                <h6 class="col_4">{{ $setting->address }}</h6>
                            </div>
                        </div>
                        {{--  <div class="col-sm-3 space_left">
                            <div class="top_1ri1 clearfix">
                                <ul class="social-network social-circle mgt">
                                    <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a>
                                    </li>
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoGoogle" title="Google +"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
