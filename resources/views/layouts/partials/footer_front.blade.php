  <section id="footer">
      <div class="container">
          <div class="row">
              <div class="footer_1 clearfix">
                  <div class="col-sm-4 space_left">
                      <div class="footer_1i clearfix">
                          <h2 class="mgt big"><a class="col_1" href="{{ url('/') }}"><span
                                      class="col" style="font-size: 25px">{{ $setting->company_name }}</a></h2>
                          <p class="col_3">
                              {!! $setting->about !!}
                          </p>
                          <ul class="social-network social-circle" style="display: none">
                              <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a>
                              </li>
                              <li><a href="#" class="icoFacebook" title="Facebook"><i
                                          class="fa fa-facebook"></i></a></li>
                              <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
                              </li>
                              <li><a href="#" class="icoGoogle" title="Google +"><i
                                          class="fa fa-google-plus"></i></a></li>
                              <li><a href="#" class="icoLinkedin" title="Linkedin"><i
                                          class="fa fa-linkedin"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-sm-3 space_left">
                      <div class="footer_1i1 clearfix">
                          <h4 class="col mgt">Contact Us</h4>
                          <hr class="hr_1 mgl">
                          <p class="col_3"><i class="fa fa-map-marker col_1"></i> {{ $setting->address }}</p>
                          <p class="col_3"><i class="fa fa-phone col_1"></i> <a class="col"
                                  href="#">{{ $setting->phone }}</a></p>
                          <p class="col_3"><i class="fa fa-envelope col_1"></i> <a class="col"
                                  href="#">{{ $setting->email }}</a></p>
                          <p class="col_3"><i class="fa fa-clock-o col_1"></i> {{ $setting->phone_hours }}</p>
                      </div>
                  </div>
                  <div class="col-sm-2 space_left">
                      <div class="footer_1i1 clearfix" style="display: none">
                          <h4 class="col mgt">Quick Links</h4>
                          <hr class="hr_1 mgl">
                          <h5 class="normal"><i class="fa fa-caret-right col_1"></i> <a href="#"> About
                                  Us</a></h5>
                          <h5 class="normal"><i class="fa fa-caret-right col_1"></i> <a href="#">
                                  FAQ's</a></h5>
                          <h5 class="normal"><i class="fa fa-caret-right col_1"></i> <a href="#"> Terms Of
                                  Service</a></h5>
                          <h5 class="normal"><i class="fa fa-caret-right col_1"></i> <a href="#"> Privacy
                                  policy</a></h5>
                          <h5 class="normal"><i class="fa fa-caret-right col_1"></i> <a href="#"> Our
                                  Services</a></h5>
                      </div>
                  </div>
                  <div class="col-sm-3 space_left">
                      <div class="footer_1i1 clearfix">
                          <h4 class="col mgt">Newsletter</h4>
                          <hr class="hr_1 mgl">
                          <p class="col_3">Subscribe Our Newsletter To Get Latest Update And News</p>
                          <form action="{{ url('/subscriber') }}" method="post">
                              @csrf
                              <input class="form-control" placeholder="Enter email here" type="email" name="email" autocomplete="off">
                              <h6 class="big"><button class="button" style="border: none"><i class="fa fa-paper-plane"></i>
                                      Subscribe Now</button></h6>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
