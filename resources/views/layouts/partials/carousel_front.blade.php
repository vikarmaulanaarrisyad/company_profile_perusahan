 @push('css')
     <style>
         p #paragraf {
             color: rgb(255 255 255);
             font-family: source-serif-pro, Georgia, Cambria, "Times New Roman", Times, serif;
             font-size: 20px;
             letter-spacing: -0.06px;
         }
     </style>
 @endpush

 <section id="center" class="center_home clearfix">
     <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
         <!-- Overlay -->
         <div class="overlay"></div>

         <!-- Indicators -->
         <ol class="carousel-indicators">
             @foreach ($sliders as $key => $item)
                 <li data-target="#bs-carousel" data-slide-to="{{ $key }}" class="{{ $key ? 'active' : '' }}">
                 </li>
             @endforeach
             {{--  <li data-target="#bs-carousel" data-slide-to="1" class=""></li>
             <li data-target="#bs-carousel" data-slide-to="2" class=""></li>  --}}
         </ol>

         <!-- Wrapper for slides -->
         <div class="carousel-inner">
             @foreach ($sliders as $key => $item)
                 <div class="item slides {{ $key == 1 ? 'active' : '' }}">
                     <div class="slide-{{ $key }}">
                         <img src="{{ Storage::url($item->path_image) }}" alt="" width="1600px" height="800px">
                     </div>
                     <div class="hero clearfix">
                         <div class="col-sm-12">
                             <h4 class="big col_1">{{ $item->slider_title }}</h4>
                             <h1 class="col big">{{ $item->slider_title }}</h1>
                             <p id="paragraf" class="col_3">
                                 {!! $item->description !!}
                             </p>
                             {{--  <h5 class="big"><a class="button" href="#">Read More <i
                                         class="fa fa-long-arrow-right"></i></a></h5>
                             <h5 class="big"><a class="button_1" href="#">About Us <i
                                         class="fa fa-long-arrow-right"></i></a></h5>  --}}
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
