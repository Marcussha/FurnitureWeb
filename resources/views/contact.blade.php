@extends('layouts.clients')

@section('title', 'Contact Us')

@section('banner-title', 'CONTACT US')

@section('content')
<section>
   <div class="container">
       <div class="row margin_top_50">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="full cont_info">
                                       <i class="fa fa-map-marker"></i>
                                       <span>Ho Chi Minh City</span>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="full cont_info">
                                       <i class="fa fa-phone"></i>
                                       <span>Call +84 1234 567 890</span>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="full cont_info">
                                       <i class="fa fa-envelope" style="font-size: 17px;"></i>
                                       <span>VietFuniture.contact@gmail.com</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
   </div>
</section>
<!-- section -->
<section class="layout_padding request_form">
   <div class="container">
      <div class="row">

         <div class="col-md-8 offset-md-2">
            <div class="full text_align_center">
               <h3>Request A Call Back</h3>
            </div>
            <div class="full">
                <form class="form_main">
                   <fieldset>
                      <div class="row">
                        <div class="col-md-10 offset-md-1">
                           <div class="full field">
                               <input type="text" name="name" placeholder="Your Name" required="" />
                           </div>
                           <div class="full field">
                               <input type="text" name="number" placeholder="Phone Number" required="" />
                           </div>
                           <div class="full field">
                               <input type="email" name="email" placeholder="Email" required="" />
                           </div>
                           <div class="full field">
                              <textarea placeholder="Message"></textarea>
                           </div>
                           <div class="full field center">
                              <button>Send</button>
                           </div>
                        </div>
                      </div>
                   </fieldset>
                </form>
            </div>
         </div>

      </div>
   </div>
</section>
<!-- end section -->
@endsection
