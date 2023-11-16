 <section id="serv_h" class="clearfix">
     <div class="container">
         <div class="row">
             <div class="serv_h1 text-center clearfix">
                 <div class="col-sm-12">
                     <h4 class="col_1 mgt">SERVICES</h4>
                     <h2 class="col_4">Best Services</h2>
                     <hr class="hr_1">
                     {{--  <p>...</p>  --}}
                 </div>
             </div>
             @foreach ($services as $service)
                 <div class="serv_h2 clearfix">
                     <div class="col-sm-3 space_left">
                         <div class="serv_h2i text-center clearfix">
                             <span><i class="{{ $service->icon }}"></i></span>
                             <hr class="hr_1">
                             <h4><a href="#">{{ $service->title }}</a></h4>
                             <p>
                                 {!! Str::limit( $service->description, 30, ' ...') !!}
                             </p>
                             <h5 class="big"><a class="button_1" href="#">Read More <i
                                         class="fa fa-long-arrow-right"></i></a></h5>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
