@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
      <div class="section-content">
          <div class="row">
            <div class="col-sx-12 col-sm-4 col-md-4">
              <div class="doctor-thumb">
                <img src="#" alt="">
              </div>
              
              <?php 
                    $slug = Request::segment(2);
                    $doctor = DB::table('doctors')->where('doctor_slug', $slug)->get();
                    if($doctor->count() > 0){
                      $doctor = $doctor->first();
                      $doctor_timmings = DB::table('doctors_timming')->where('doctor_id', $doctor->id)->get();
                    }
                    //echo '<pre>';
                    //print_r($doctor);
              ?>
              @if(!$doctor) 
                <p>Doctor Details Not Found!</p>
              @endif
 @if($doctor)
              
              <ul class="styled-icons icon-gray text-center mt-15 mb-15">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
              
                <div class="">
                  <div class="border-5px p-20">
                    <h5><i class="fa fa-clock-o text-theme-colored"></i> Opening Hours</h5>
                    <div class="opening-hours text-left">
                    @if($doctor_timmings && $doctor_timmings->count() > 0)
                      <ul class="list-unstyled">
                      
                        @foreach($doctor_timmings as $doctor_time)
                        <?php 
                            $day = '';
                            switch($doctor_time->day){
                              case 1 : {$day = 'Monday';}break;
                              case 2 : {$day = 'Tuesday';}break;
                              case 3 : {$day = 'Wednesday';}break;
                              case 4 : {$day = 'Thursday';}break;
                              case 5 : {$day = 'Friday';}break;
                              case 6 : {$day = 'Saturday';}break;
                              case 7 : {$day = 'Sunday';}break;
                            }
                        ?>
                        <li class="clearfix line-height-1"> <span>{{$day}}</span>
                          <div class="value"> {{$doctor_time->st_time}} - {{$doctor_time->end_time}} </div>
                        </li>
                        @endforeach  
                     
                        <?php /*<li class="clearfix line-height-1"> <span> Saturday </span>
                          <div class="value"> 10.00 - 16.00 </div>
                        </li>
                        <li class="clearfix line-height-1"> <span> Sunday </span>
                          <div class="value"> 9.00 - 18.00 </div>
                        </li>*/ ?>

                      </ul>
 @endif

                    </div>
                  </div>
                </div>
                @endif
                <?php /*<div class="mt-30">
                <h4>Client's Feedback</h4>
                <div class="owl-carousel-1col owl-carousel owl-theme owl-loaded" data-dots="true">
                  
                  
                  
                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1080px, 0px, 0px); transition: all 0.25s ease 0s; width: 1800px;"><div class="owl-item cloned" style="width: 360px; margin-right: 0px;"><div class="item">
                    <div class="testimonial style1">
                      <div class="comment">
                        <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-left flip"> <img class="img-circle" alt="" src="#"> </div>
                        <div class="text-right flip pull-right flip mr-20 mt-10">
                          <h5 class="author text-theme-colored">Jonathan Smith</h5>
                          <h6 class="title">cici inc.</h6>
                        </div>
                      </div>
                    </div>
                  </div></div><div class="owl-item" style="width: 360px; margin-right: 0px;"><div class="item">
                    <div class="testimonial style1">
                      <div class="comment">
                        <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-left flip"> <img class="img-circle" alt="" src="#"> </div>
                        <div class="text-right flip pull-right flip mr-20 mt-10">
                          <h5 class="author text-theme-colored">Jonathan Smith</h5>
                          <h6 class="title">cici inc.</h6>
                        </div>
                      </div>
                    </div>
                  </div></div><div class="owl-item" style="width: 360px; margin-right: 0px;"><div class="item">
                    <div class="testimonial style1">
                      <div class="comment">
                        <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-left flip"> <img class="img-circle" alt="" src="#"> </div>
                        <div class="text-right flip pull-right flip mr-20 mt-10">
                          <h5 class="author text-theme-colored">Jonathan Smith</h5>
                          <h6 class="title">cici inc.</h6>
                        </div>
                      </div>
                    </div>
                  </div></div><div class="owl-item active" style="width: 360px; margin-right: 0px;"><div class="item">
                    <div class="testimonial style1">
                      <div class="comment">
                        <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-left flip"> <img class="img-circle" alt="" src="#"> </div>
                        <div class="text-right flip pull-right flip mr-20 mt-10">
                          <h5 class="author text-theme-colored">Jonathan Smith</h5>
                          <h6 class="title">cici inc.</h6>
                        </div>
                      </div>
                    </div>
                  </div></div><div class="owl-item cloned" style="width: 360px; margin-right: 0px;"><div class="item">
                    <div class="testimonial style1">
                      <div class="comment">
                        <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-left flip"> <img class="img-circle" alt="" src="#"> </div>
                        <div class="text-right flip pull-right flip mr-20 mt-10">
                          <h5 class="author text-theme-colored">Jonathan Smith</h5>
                          <h6 class="title">cici inc.</h6>
                        </div>
                      </div>
                    </div>
                  </div></div></div></div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;"><i class="pe-7s-angle-left"></i></div><div class="owl-next" style="display: none;"><i class="pe-7s-angle-right"></i></div></div><div class="owl-dots" style=""><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div></div></div></div>
              </div>*/ ?>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 pl-20 pl-sm-15">
              <div>
                <h3 class="mt-0">@if($doctor) {{$doctor->doctor_fullname}} @endif</h3>
                <h5 class="text-theme-colored">@if($doctor) {{$doctor->doctor_degree}} @endif</h5>
                <p>@if($doctor) {{$doctor->doctor_address}} @endif</p>
                <hr>
                <p class="">@if($doctor) {{$doctor->doctor_details}} @endif</p>
              </div>
              <div class="mt-30">
              <?php if($doctor && $doctor->doctor_specialty_id != ''){?>
                <h4 class="text-uppercase">Specialties &amp; Qualifications</h4>
                <?php /*              
                <h5>Specialtiy: <span class="text-theme-colored">Endocrinology</span></h5>
                <p>Specialty of medicine; some would say a sub-specialty of internal medicine, which deals with the diagnosis and treatment of diseases related to hormones. </p>
                <h5>Specialtiy: <span class="text-theme-colored">Paediatric Medicine</span></h5>
                <p>Specialty of medicine; some would say a sub-specialty of internal medicine, which deals with the diagnosis and treatment of diseases related to hormones. </p>
                */ ?>
                
                <?php
                    $deptExist = DB::table('departments')->where('id', $doctor->doctor_specialty_id)->get();
                    if($deptExist){
                      $specialty_name = $deptExist->first()->title;
                    }else{$specialty_name = '';}
                ?>
                
                <h5>Specialtiy: <span class="text-theme-colored">@if($doctor) {{$specialty_name}} @endif</span></h5>
                <?php
                  }
                ?>

                @if($doctor)
                <h4 class="mt-30 text-uppercase">Experience</h4>
                <ul class="list theme-colored angle-double-right m-0">
                  <li class="mt-0"> {{$doctor->doctor_experience}} Year(s) </li>
                </ul>
                @endif
                
                <?php /*<h4 class="mt-30 text-uppercase">Education &amp; Medical Training</h4>
                <ul class="list theme-colored angle-double-right m-0">
                  <li class="mt-0"><strong>Doctor of Medicine</strong><br> University of Texas, USA (1990)</li>
                  <li><strong>Medical Orientation Program</strong><br> St. Louis University (St. Louis, Missouri 1996)</li>
                </ul>
                <h4 class="mt-30 text-uppercase">Experience</h4>
                <ul class="list theme-colored angle-double-right m-0">
                  <li class="mt-0"><strong>Vice President and Chief Medical Officer,</strong> Kessler Institute for Rehabilitation</li>
                  <li><strong>Medical Corporation Professor,</strong> Institute Of Coast Private Hospital Campus</li>
                </ul>
                <h4 class="mt-30 text-uppercase">Certifications</h4>
                <ul class="list theme-colored angle-double-right m-0">
                  <li class="mt-0"><strong>American Board of Psychiatry and Neurology</strong><br> Certified in Psychiatry</li>
                  <li><strong>MA State Medical License</strong><br> Active through 2016</li>
                </ul>
                <h4 class="mt-30 text-uppercase">Publications &amp; Presentations</h4>
                <ul class="list theme-colored angle-double-right m-0">
                  <li class="mt-0"><strong>Vice President and Chief Medical Officer,</strong> Kessler Institute for Rehabilitation</li>
                  <li><strong>Medical Corporation Professor,</strong> Institute Of Coast Private Hospital Campus</li>
                </ul>*/ ?>

              </div>
              @if($doctor)
              <br><br>
              <a href='{{url("appointment")}}' class='btn btn-primary' style='background-color:#ee1638'>Book Appointment</a>
              <br><br>
              @endif
            </div>
          </div>
        </div>

        
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
