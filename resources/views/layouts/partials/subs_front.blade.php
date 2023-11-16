 <section id="subs">
     <div class="container">
         <div class="row">
             <div class="subs1 text-center clearfix">
                 <div class="col-sm-12">
                     <h2 class="mgt col_1">Subscribe to our newsletter</h2>
                     <p>Get updates for new classes and new products </p>
                     <form action="{{ url('/subscriber') }}" method="post">
                         @csrf
                         <input class="form-control" placeholder="Enter email here" type="email" name="email" value="{{ old('email') }}" autocomplete="off">
                         <h5 class="big"><button style="border: none" class="button"
                                 href="#">Subscribe</button></h5>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </section>
