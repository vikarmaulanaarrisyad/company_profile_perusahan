<section id="gallery" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="serv_h1 text-center clearfix">
                <div class="col-sm-12">
                    <h4 class="col_1 mgt">GALLERY</h4>
                    <h2 class="col_4">Photo Gallery</h2>
                    <hr class="hr_1">
                    <p>
                        Photo Gallery Seputar {{ $setting->company_name }}.
                    </p>
                </div>
            </div>
            <div class="gallery_1 clearfix">
                @foreach ($gallery as $key => $i)
                    <div class="col-sm-4">
                        <div class="gallery_1i text-center">
                            <div class="gallery_1i1 clearfix">
                                <div class="grid clearfix">
                                    <figure class="effect-jazz">
                                        <a href="#"><img src="{{ Storage::url($i->path_image) }}" height="300"
                                                class="iw" alt="img25"></a>
                                    </figure>
                                </div>
                            </div>
                            <div class="gallery_1i2 clearfix">
                                {{--  <h6 class="big mgt"><a class="button mgt" href="#">Order Now <i
                                            class="fa fa-long-arrow-right"></i></a></h6>  --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--  <div class="col-sm-4">
                    <div class="gallery_1i text-center">
                        <div class="gallery_1i1 clearfix">
                            <div class="grid clearfix">
                                <figure class="effect-jazz">
                                    <a href="#"><img src="{{ asset('frontend') }}/img/7.jpg" height="300"
                                            class="iw" alt="img25"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="gallery_1i2 clearfix">
                            <h6 class="big mgt"><a class="button mgt" href="#">Order Now <i
                                        class="fa fa-long-arrow-right"></i></a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gallery_1i text-center">
                        <div class="gallery_1i1 clearfix">
                            <div class="grid clearfix">
                                <figure class="effect-jazz">
                                    <a href="#"><img src="{{ asset('frontend') }}/img/8.jpg" height="300"
                                            class="iw" alt="img25"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="gallery_1i2 clearfix">
                            <h6 class="big mgt"><a class="button mgt" href="#">Order Now <i
                                        class="fa fa-long-arrow-right"></i></a></h6>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
</section>
