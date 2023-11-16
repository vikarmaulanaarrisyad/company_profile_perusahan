    <section id="blog_h">
        <div class="container">
            <div class="row">
                <div class="serv_h1 text-center clearfix">
                    <div class="col-sm-12">
                        <h4 class="col_1 mgt">Berita</h4>
                        <h2 class="col_4">Berita Terbaru</h2>
                        <hr class="hr_1">
                        <p>Berita Seputar {{ $setting->company_name }}.</p>
                    </div>
                </div>
                <div class="blog_home_1 mgt clearfix">
                    @foreach ($posts as $post)
                        <div class="col-sm-4">
                            <div class="blog_home_1i clearfix">
                                <div class="grid clearfix">
                                    <figure class="effect-jazz">
                                        <a href="#"><img src="{{ Storage::url($post->path_image) }}"
                                                class="iw" alt="img25"></a>
                                    </figure>
                                </div>
                                <div class="blog_home_1i1 clearfix">
                                    <h5 class="mgt"><a href="#">{{ $post->post_title }}</a></h5>
                                    <h6 class="col_2"><span class="span_1 col_1"><i class="fa fa-calendar"></i></span>
                                        {{ tanggal_indonesia($post->created_at) }}
                                        {{--  <span class="span_2 col_1"><i class="fa fa-comment-o"></i></span> 25  --}}
                                        <span class="span_2 col_1"><i class="fa fa-eye"></i></span> 15
                                    </h6>
                                    <p>

                                        {!! Str::limit($post->body, 100, ' ...') !!}
                                    </p>
                                    <ul class="social-network social-circle" style="display: none;">
                                        <li><a href="#" class="icoRss" title="Rss"><i
                                                    class="fa fa-rss"></i></a>
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
                                    <h6 class="big"><a class="button_1" href="#">Read More <i
                                                class="fa fa-long-arrow-right"></i></a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
