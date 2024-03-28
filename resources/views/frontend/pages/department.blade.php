@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content" style='padding:0px 180px;'>
    <!-- Section: home -->
   <?php 
          $slug = Request::segment(2);
          $depExist = DB::table('departments')->where('slug', $slug)->get();
          if($depExist){$department = $depExist->first();}else{$department = false;}
   ?>
    <div class="row mtli-row-clearfix">
          <div class="col-sm-6 col-md-8 col-lg-8">
            <div class="campaign maxwidth500 mb-sm-30">
            <?php /*<div class="thumb">
                <img src="#" alt="" class="img-fullwidth">
                <div class="campaign-overlay"></div>
              </div>*/ ?>
              <h4 class=""><a href="#">@if($department) {{$department->title}} @endif</a></h4>
            </div>
            <div class="event-details">
              <p class="mb-20 mt-0">@if($department) {{$department->description}} @endif</p>
              
              <?php /*<div class="pull-left flip mr-15">
                <img alt="" src="#">
              </div>
              <div class="">
                <p class="text-black-light"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nequep aliquid suscipit voluptas ab temporibus, animi impedit ipsum, sunt rem sed ut quod quas earum inventore expedita consectetur.</em></p>
                <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ducimus illum modi? Libero saepe perspic reiciendis iusto et cupiditate. Repudiandae provident, consectetur, sapiente, libero iure necessitatibus corporis nulla sit voluptate, quisquam aut eum perspiciatis? Fugiat labore aspernatur </p>
              </div>
              <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat qui ducimus illum modi? Libero saepe perspiciatis accusamus soluta perferendis, ad illum, nesciunt, reiciendis iusto et cupiditate. Repudiandae provident, consectetur, sapiente, libero iure necessitatibus corporis nulla voluptate, quisquam aut eum perspiciatis? Fugiat labore aspernatur eius, perspiciatis ut molestiae, delectus rem tempora omnis optio odio autem asperiores quae maiores ea eveniet cupiditate aut repellendus? Quo iure explicabo quam reprehenderit ipsam sequi. Perferendis esse iure ullam, illum, quibusdam corporis nobis dolores.
              </p>
              */ ?>
            </div>
          </div>

          <?php /*<div class="col-sm-6 col-md-4 col-lg-4">
            <div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">All Services</h5>
                <ul class="list-divider list-border list check">
                  <li><a class="text-theme-colored" href="page-services-cardiology-depertment.html">Orthopaedics Depertment</a></li>
                  <li><a href="page-services-cardiology-depertment.html">Cardiology Depertment</a></li>
                  <li><a href="page-services-neurology-depertment.html">Neurology Depertment</a></li>
                  <li><a href="page-services-urology-depertment.html">Urology Depertment</a></li>
                  <li><a href="page-services-dental-depertment.html">Dental  Depertment</a></li>
                  <li><a href="page-services-haematology-depertment.html">Haematology Depertment</a></li>
                </ul>
              </div>

              <div class="widget">
                <div class="border-10px p-30">
                  <h5><i class="fa fa-clock-o text-theme-colored"></i> Opening Hours</h5>
                  <div class="opening-hours text-left">
                    <ul class="list-unstyled">
                      <li class="clearfix line-height-1"> <span> Monday - Friday </span>
                        <div class="value"> 9.00 - 20.00 </div>
                      </li>
                      <li class="clearfix line-height-1"> <span> Saturday </span>
                        <div class="value"> 10.00 - 16.00 </div>
                      </li>
                      <li class="clearfix line-height-1"> <span> Sunday </span>
                        <div class="value"> 9.30 - 18.00 </div>
                      </li>
                    </ul>
                  </div>
                  <a href="#" class="btn btn-dark btn-theme-colored mt-15">View Hospital Details</a>
                </div>
              </div>
              <div class="widget">
                <h5 class="widget-title line-bottom">Image gallery with text</h5>
                <div class="owl-carousel-1col owl-carousel owl-theme owl-loaded">

                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-720px, 0px, 0px); transition: all 0.25s ease 0s; width: 1800px;"><div class="owl-item cloned" style="width: 360px; margin-right: 0px;"><div class="item">
                    <img src="#" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div></div><div class="owl-item" style="width: 360px; margin-right: 0px;"><div class="item">
                    <img src="#" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div></div><div class="owl-item active" style="width: 360px; margin-right: 0px;"><div class="item">
                    <img src="#" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div></div><div class="owl-item" style="width: 360px; margin-right: 0px;"><div class="item">
                    <img src="#" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div></div><div class="owl-item cloned" style="width: 360px; margin-right: 0px;"><div class="item">
                    <img src="#" alt="">
                    <h4 class="title">This is a Demo Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum amet illo.</p>
                  </div></div></div></div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;"><i class="pe-7s-angle-left"></i></div><div class="owl-next" style="display: none;"><i class="pe-7s-angle-right"></i></div></div><div class="owl-dots" style="display: none;"></div></div></div>
              </div>
              */ ?>
            </div>
          </div>
        </div>

  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
