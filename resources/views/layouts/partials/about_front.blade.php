 <section id="about_h" class="clearfix">
     <div class="container">
         <div class="row">
             <div class="about_h1 clearfix">
                 <div class="col-sm-6">
                     <div class="about_h1l clearfix">
                         <div class="grid clearfix">
                             <figure class="effect-jazz">
                                 <a href="#"><img src="{{ Storage::url($about->path_image) }}" height="520"
                                         class="iw" alt="img25"></a>
                             </figure>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="about_h1r clearfix">
                         <h4 class="mgt col_1">ABOUT US</h4>
                         <h2 class="col_4">{{ $about->title }}</h2>
                         <p class="col_2">
                             {!! $about->body !!}
                         </p>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
