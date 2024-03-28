@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container-fluid p-0">
        
        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
          <div class="rev_slider" data-version="5.0">
            <ul>
              <?php 
                  $slides = [
                              [
                                'image'=>'bg27.jpg',
                                'heading1'=>'We Provide Total',
                                'heading2'=>'Health Care Solution',
                                'content'=>'Every day we bring hope to millions of children in the worlds.'
                              ],
                              [
                                'image'=>'bg23.jpg',
                                'heading1'=>'We Provide Total',
                                'heading2'=>'Health Care Solution',
                                'content'=>'Every day we bring hope to millions of children in the worlds.'
                              ],
                              [
                                'image'=>'bg24.jpg',
                                'heading1'=>'We Provide Total',
                                'heading2'=>'Health Care Solution',
                                'content'=>'Every day we bring hope to millions of children in the worlds.'
                              ],
                            ];
          $slides = $slider;  
          //echo '<pre>';              
          //print_r($slides[0]->image1);
          //die;
          if($slides){$count = 1;
            foreach($slides as $slide){
              for($i=1;$i<=10;$i++){
             ?>
			  <!-- SLIDE 1-10 -->
        <?php 
        $image = 'image'.$count; 
        $slideposition = '';
        if($slide->$image !=''){
          switch($i){
            case 1 : {$slideposition = 'center';}break;
            case 2 : {$slideposition = 'left';}break;
            case 3 : {$slideposition = 'right';}break;
            case 4 : {$slideposition = 'center';}break;
            case 5 : {$slideposition = 'left';}break;
            case 6 : {$slideposition = 'right';}break;
            case 7 : {$slideposition = 'center';}break;
            case 8 : {$slideposition = 'left';}break;
            case 9 : {$slideposition = 'right';}break;
            case 10 : {$slideposition = 'center';}break;
          }
        
        ?>

              <li data-index="rs-{{$count}}" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                
                <img src="{{url('public/uploads/HpMainSliderImages/'.$slide->$image)}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <?php $headinga = 'heading'.$count.'a'; ?>
                <div class="tp-caption tp-resizeme text-uppercase text-black pl-30 pr-30"
                  id="rs-{{$count}}-layer-1"
                
                  data-x="['{{$slideposition}}']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-90']" 
                  data-fontsize="['30']"
                  data-lineheight="['54']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:bolder;  font-weight:700;">{{$slide->$headinga}}
                </div>

                <!-- LAYER NR. 2 -->
                <?php $headingb = 'heading'.$count.'b'; ?>
                <div class="tp-caption tp-resizeme text-uppercase text-theme-colored pl-40 pr-40"
                  id="rs-{{$count}}-layer-2"

                  data-x="['{{$slideposition}}']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-20']"
                  data-fontsize="['54']"
                  data-lineheight="['70']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:800;">{{$slide->$headingb}} 
                </div>

                <!-- LAYER NR. 3 -->
                <?php $link = 'link'.$count; ?>
                <?php $detail = 'detail'.$count; ?>
                <div class="tp-caption tp-resizeme text-center text-black" 
                  id="rs-{{$count}}-layer-3"

                  data-x="['{{$slideposition}}']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['50','60','70']"
                  data-fontsize="['16','18','24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;">{{$slide->$detail}}
                </div>

              </li>      

              <?php 
              $count++;
              }
              }
            }
          }
              /*
              <!-- SLIDE 1 -->
              <li data-index="rs-1" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{url('public/frontend/images/bg27.jpg')}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-black pl-30 pr-30"
                  id="rs-1-layer-1"
                
                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-90']" 
                  data-fontsize="['30']"
                  data-lineheight="['54']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:bolder;  font-weight:700;">We Provide Total
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-theme-colored pl-40 pr-40"
                  id="rs-1-layer-2"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-20']"
                  data-fontsize="['54']"
                  data-lineheight="['70']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:800;">Health Care Solution 
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-center text-black" 
                  id="rs-1-layer-3"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['50','60','70']"
                  data-fontsize="['16','18','24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;">Every day we bring hope to millions of children in the world's<br>  hardest places as a sign of God's unconditional love.
                </div>

              </li>

              <!-- SLIDE 2 -->
              <li data-index="rs-2" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{url('public/frontend/images/bg23.jpg')}}"  alt=""  data-bgposition="center 20%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-black"
                  id="rs-2-layer-1"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-110']" 
                  data-fontsize="['30']"
                  data-lineheight="['50']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:bolder; font-weight:700;">We Provide Total
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-theme-colored"
                  id="rs-2-layer-2"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-45']" 
                  data-fontsize="['54']"
                  data-lineheight="['70']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:800;">Health Care Solution 
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-black" 
                  id="rs-2-layer-3"

                  data-x="['left']"
                  data-hoffset="['35']"
                  data-y="['middle']"
                  data-voffset="['35','45','55']"
                  data-fontsize="['16','18','24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;">Every day we bring hope to millions of children in the world's<br>  hardest places as a sign of God's unconditional love.
                </div>

               
              </li>

              <!-- SLIDE 3 -->
              <li data-index="rs-3" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb=""  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{url('public/frontend/images/bg24.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-black"
                  id="rs-3-layer-1"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-110']" 
                  data-fontsize="['30']"
                  data-lineheight="['50']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:bolder; font-weight:700;">We Provide Total
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-theme-colored font-raleway"
                  id="rs-3-layer-2"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-45']" 
                  data-fontsize="['54']"
                  data-lineheight="['70']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:800;">Health Care Solution 
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-right text-black" 
                  id="rs-3-layer-3"

                  data-x="['right']"
                  data-hoffset="['35']"
                  data-y="['middle']"
                  data-voffset="['30','40','50']"
                  data-fontsize="['16','18','24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;">Every day we bring hope to millions of children in the world's<br>  hardest places as a sign of God's unconditional love.
                </div>
              </li>*/ ?>
            </ul>
          </div>
          <!-- end .rev_slider -->
        </div>
        <!-- end .rev_slider_wrapper -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
          $(document).ready(function(e) {
              //alert('js ready');
            var revapi = $(".rev_slider").revolution({
              sliderType:"standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                  arrows: {
                      style: "zeus",
                      enable: true,
                      hide_onmobile: true,
                      hide_under:600,
                      hide_onleave: true,
                      hide_delay: 200,
                      hide_delay_mobile: 1200,
                      tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                      left: {
                          h_align: "left",
                          v_align: "center",
                          h_offset: 30,
                          v_offset: 0
                      },
                      right: {
                          h_align: "right",
                          v_align: "center",
                          h_offset: 30,
                          v_offset: 0
                      }
                  },
                  bullets: {
                    enable:true,
                    hide_onmobile:true,
                    hide_under:600,
                    style:"metis",
                    hide_onleave:true,
                    hide_delay:200,
                    hide_delay_mobile:1200,
                    direction:"horizontal",
                    h_align:"center",
                    v_align:"bottom",
                    h_offset:0,
                    v_offset:30,
                    space:5,
                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [680, 500, 400, 400],
              lazyType: "none",
              parallax: {
                  origo: "slidercenter",
                  speed: 1000,
                  levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                  type: "scroll"
              },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });
          });
        </script>
        <!-- Slider Revolution Ends -->

      </div>
    </section>

    <!-- Section:about-->
    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
          <div class="col-md-4">
            <div class="border-10px p-30 pt-10 pb-20 bg-lightest">
              <h4 class="text-theme-colored">Doctor's Appointment! </h4>
              <p class="mt-0">Just make an appointment to get help from our experts</p>

              <p>
                  Now you no longer have to wait in long queues to see the doctor. Instead, you can simply consult our certified doctors to get medical advice from the comfort of your homes through the FameHospital Hospital Online Doctor service. This service helps patients who are unable to physically visit the hospital to consult with doctors via an online platform.
              </p>

              <a href="{{url('appointment')}}" class="btn btn-dark btn-theme-colored">
                Make an Appointment
              </a>
              <!-- Appontment Form Starts -->
              <?php /*<form id="appointment_form_at_home" name="appointment_form_at_home" class="" method="post" action="includes/appointment.php">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="form_name" name="form_name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_appontment_date" class="form-control required datetime-picker" type="text" placeholder="Appoinment Date & Time" aria-required="true">
                    </div>
                  </div>
                </div>
                <div class="form-group mb-10">
                  <textarea id="form_message" name="form_message" class="form-control required"  placeholder="Enter Message" rows="4" aria-required="true"></textarea>
                </div>
                <div class="form-group mb-0 mt-20">
                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                </div>
              </form>*/ ?>

              <!-- Appointment Form Validation-->
              <script type="text/javascript">
                $("#appointment_form_at_home").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>
              <!-- Appontment Form Ends -->
            </div>
          </div>
          <?php /*<div class="col-md-8">
            <h2 class="title line-bottom line-height-1 mt-0 mt-sm-30">
              <span>Welcome To <span class="text-theme-colored">Medicative</span></span></h2>
              
            <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam.
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-4 pb-sm-20">
                <h4 class="title mt-0 mb-15">Free Consultation</h4>
                <div class="image-box-thum">
                  <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/a1.jpg')}}">
                </div>
                <div class="image-box-details pt-20 pb-sm-20">
                  <p class="desc mb-10">Consectetur adipisicing elit. Quis ipsa ullam dicta suscipit ipsum porro molestias cum nihil.</p>
                  <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 pb-sm-20">
                <h4 class="title mt-0 mb-15">Excellent Services</h4>
                <div class="image-box-thum">
                  <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/a2.jpg')}}">
                </div>
                <div class="image-box-details pt-20 pb-sm-20">
                  <p class="desc mb-10">Consectetur adipisicing elit. Quis ipsa ullam dicta suscipit ipsum porro molestias cum nihil.</p>
                  <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 pb-sm-20">
                <h4 class="title mt-0 mb-15">Online Payment</h4>
                <div class="image-box-thum">
                  <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/a3.jpg')}}">
                </div>
                <div class="image-box-details pt-20">
                  <p class="desc mb-10">Consectetur adipisicing elit. Quis ipsa ullam dicta suscipit ipsum porro molestias cum nihil.</p>
                  <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
                </div>
              </div>
            </div>
          </div>*/ ?>
          @php
          use App\Models\Hpmessage;
          $hpmessages = hpmessage::where('show_on_hp','1')->get();
          @endphp
 
          <div class="col-md-8">
            @foreach($hpmessages as $hpmessage)
           <h2> <span>Welcome To <span class="text-theme-colored">{{$hpmessage->main_heading}}</span></span></h2>
              
            <p class="mb-20">{{$hpmessage->description}}
             
            <div class="row">
              @for($i=1;$i<=3;$i++)
              <?php
              $sort=$hpmessage['sort'.$i];
                          switch($sort){
                              case 1 : {
                                $url = url('public/uploads/hpmessageImages/'.$hpmessage->image1);
                               $heading = $hpmessage->heading1;
                               $description= $hpmessage->description1;
                               $slug= $hpmessage->slug1;

                              }break;

                              case 2 : {
                               $url = url('public/uploads/hpmessageImages/'.$hpmessage->image2);
                               $heading = $hpmessage->heading2;
                               $description= $hpmessage->description2;
                               $slug= $hpmessage->slug2;


                              }break;
                              case 3 : {
                               $url = url('public/uploads/hpmessageImages/'.$hpmessage->image3);
                               $heading = $hpmessage->heading3;
                               $description= $hpmessage->description3;
                                $slug= $hpmessage->slug3;


                              }break;
                          }
                  ?>
              <div class="col-xs-12 col-sm-6 col-md-4 pb-sm-20">
                <h4 class="title mt-0 mb-15">{{$heading}}</h4>
                <div class="image-box-thum">
                  <img class="img-fullwidth" alt="" src="{{$url}}" width="245" height="170">
                </div>
                <div class="image-box-details pt-20 pb-sm-20">
                    <p class="desc mb-10">
                    {{substr($description,0,80)}}
                    </p>
                  <a href="hpmessages/{{$slug}}" class="btn btn-xs btn-theme-colored">Read more</a>
                </div>
              </div>
           @endfor
            </div>
             @endforeach
          </div>
          
          </div>
        </div>
      </div>
    </section>
    <?php 
      use App\Models\Hpservices;
      $hpservices = Hpservices::where('show_on_hp', '1')->get();
    ?>
    
    <!-- Section: Services -->
    <?php /* <section id="services" class="bg-silver-light">
      <div class="container pb-40">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">Services</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-30 p-10">
                <i class="fa fa-user-md font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">Qualified Doctors</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-30 p-10">
                <i class="fa fa-medkit font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">Outdoor Checkup</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-30 p-10">
                <i class="flaticon-medical-ambulance14 font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">Emergency Care</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-sm-30 p-10">
                <i class="flaticon-medical-hospital17 font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">Operation Theatre</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-sm-30 p-10">
                <i class="flaticon-medical-hospital16 font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">Cancer Service</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="text-center mb-sm-30 p-10">
                <i class="flaticon-medical-hospital35 font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">General Medical</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi qui inventore, cumque nulla rerum consem!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>*/ ?>

    <!-- Divider: Funfact -->
   <?php /* <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.7">
      <div class="container pt-60 pb-60">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="1754" class="animate-number text-white font-42 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Happy Patients</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-rocket mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-42 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Our Services</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-add-user mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="248" class="animate-number text-white font-42 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Our Doctors</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-global mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white font-42 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Service Points</h5>
            </div>
          </div>
        </div>
      </div>
    </section>*/ ?>

 <!-- Section: Services -->
 <section id="services" class="bg-silver-light">
      <div class="container pb-40">
        <div class="section-title text-center">
          @foreach($hpservices as $hpservice)
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">{{$hpservice->mainheading}}</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>{{$hpservice->description}}</p>
            </div>
          </div>
        
        </div>
        <div class="section-content">
          <div class="row">

             @for($i=1;$i<=6;$i++)
              <?php
              $sort=$hpservice['sort'.$i];
                          switch($sort){
                              case 1 : {
           
                               $heading = $hpservice->heading1;
                               $descriptions= $hpservice->description1;
                               $slug= $hpservice->slug1;
                               $icon= $hpservice->icon1;

                              }break;

                              case 2 : {
                              
                               $heading = $hpservice->heading2;
                               $descriptions= $hpservice->description2;
                               $slug= $hpservice->slug1;
                               $icon= $hpservice->icon2;


                              }break;
                              case 3 : {
                           
                               $heading = $hpservice->heading3;
                               $descriptions= $hpservice->description3;
                                $slug= $hpservice->slug3;
                               $icon= $hpservice->icon3;

                              }break;

                                case 4 : {
                           
                               $heading = $hpservice->heading4;
                               $descriptions= $hpservice->description4;
                                $slug= $hpservice->slug4;
                               $icon= $hpservice->icon4;

                              }break;

                                case 5 : {
                           
                               $heading = $hpservice->heading5;
                               $descriptions= $hpservice->description5;
                                $slug= $hpservice->slug5;
                               $icon= $hpservice->icon5;

                              }break;

                                case 6 : {
                           
                               $heading = $hpservice->heading6;
                               $descriptions= $hpservice->description6;
                                $slug= $hpservice->slug6;
                               $icon= $hpservice->icon6;

                              }break;
                          }
                  ?>


             
              
              
           
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="text-center mb-30 p-10">
                <i class="{{$icon}} font-weight-600 text-theme-colored font-38"></i>
                <h4 class="font-weight-600 mt-20">{{$heading}}</h4>
                <p>{{substr($descriptions,0,200)}}</p>
                  <a href="hpservices/{{$slug}}" class="btn btn-xs btn-theme-colored">Read more</a>

              </div>
                

            </div>
           @endfor
          
  
          </div>
            @endforeach
        </div>
      </div>
    </section>




    <!-- Section: Departments -->
    <section>
      <div class="container pb-30">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">Our Departments</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>There are several departments are found in FameHealth hospitals namely Outpatient department (OPD), Inpatient Service (IP), Medical Department, Nursing Department, Paramedical Department, Physical Medicine and Rehabilitation Department, Operation Theatre Complex (OT), Pharmacy Department, Radiology Department (X-ray), Dietary Department, Non-professional Services (Business Management), Medical Record Department (MRD) and Personnel Department.</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="col-md-12">
            <div class="owl-carousel-4col" data-nav="true">

            @php
          use App\Models\Departments;
          $departments = Departments::all();
          @endphp
          
            @foreach($departments as $deppt)
              <div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/uploads/DepartmentsImages/'.$deppt->image)}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <?php /*<h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>*/ ?>
                    <a href='{{url("deptt/".$deppt->slug)}}'><h4 class="title9 font-weight-700 text-uppercase mt-0">{{$deppt->title}}</h4></a>
                  </div>
                </div>
              </div>
            @endforeach

              <?php /*<div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/2.jpg')}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>
                    <h4 class="title font-weight-700 text-uppercase mt-0">Departments Title</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/3.jpg')}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>
                    <h4 class="title font-weight-700 text-uppercase mt-0">Departments Title</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/4.jpg')}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>
                    <h4 class="title font-weight-700 text-uppercase mt-0">Departments Title</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/5.jpg')}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>
                    <h4 class="title font-weight-700 text-uppercase mt-0">Departments Title</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="project mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="{{url('public/frontend/images/6.jpg')}}">
                    <div class="hover-link">
                      <a href="#"><i class="flaticon-medical-hospital16"></i></a>
                    </div>
                  </div>
                  <div class="project-details p-15 pt-10 pb-10">
                    <h5 class="sub-title font-14 font-weight-500 mb-5">Subtitle place here</h5>
                    <h4 class="title font-weight-700 text-uppercase mt-0">Departments Title</h4>
                  </div>
                </div>
              </div>
                */ ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Pricing -->
    <?php /*<section id="pricing" class="bg-silver-light">
      <div class="container pb-30">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">Pricing</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInLeft animation-delay1">
              <div class="pricing-table style1 bg-white border-10px text-center">
                <div class="pricing-icon">
                  <i class="flaticon-medical-teeth1"></i>
                </div>
                <div class="p-40">
                  <h3 class="package-type mt-90">Dental Care</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <h1 class="price text-theme-colored mb-10">24<span class="font-48">%</span></h1>
                  <h4 class="">Discount</h4>
                  <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInUp animation-delay1">
              <div class="pricing-table style1 bg-white border-10px text-center">
                <div class="pricing-icon">
                  <i class="flaticon-medical-hospital35"></i>
                </div>
                <div class="p-40">
                  <h3 class="package-type mt-90">Blood Test</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <h1 class="price text-theme-colored mb-10">15<span class="font-48">%</span></h1>
                  <h4 class="">Discount</h4>
                  <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInRight animation-delay1">
              <div class="pricing-table style1 bg-white border-10px text-center">
                <div class="pricing-icon">
                  <i class="flaticon-medical-stethoscopes"></i>
                </div>
                <div class="p-40">
                  <h3 class="package-type mt-90">Medical Care</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <h1 class="price text-theme-colored mb-10">30<span class="font-48">%</span></h1>
                  <h4 class="">Discount</h4>
                  <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>*/ ?>

    <!-- Divider: Divider -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12 text-center">
            <h2 class="font-28 text-white">For Emergency Service Please Contact</h2>
            <h3 class="font-30 text-white">(+0088 011-224-363)</h3>
          </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Doctors -->
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">Our Doctors</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>The FameHealth provides effective and high-quality healthcare services with 33 departments, 16 special units and 671 physicians. We offer an up-to-date medical approach in an ethical and reliable environment. We maintain our reputation in the health sector with our experienced medical staff who continuously improve qualified healthcare with an uncompromising focus when it comes to proficiency and academic values. You can locate our doctors by searching for each doctor's name, department name or specialty in the search bar below</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row multi-row-clearfix">
          @php
          use App\Models\Doctor;
          $doctors = Doctor::offset(0)->limit(4)->get();
          @endphp
          
          @foreach($doctors as $doctor)
            <div class="col-sm-6 col-md-3 sm-text-center mb-sm-30">
              <div class="team maxwidth400">
                <div class="thumb"><img class="img-fullwidth" src="{{url('public/uploads/DoctorImagesSave/'.$doctor->doctor_profileImage.'')}}" alt=""></div>
                <div class="content border-1px p-15 bg-light clearfix">
                  <h4 class="name text-theme-color-2 mt-0">{{$doctor->doctor_fullname}}</h4>
                  <p class="mb-20">{{substr($doctor->doctor_details, 0 , 55)}}</p>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <a class="btn btn-theme-colored btn-sm pull-right flip" href="{{url('doctor/'.$doctor->doctor_slug)}}">view details</a>
                </div>
              </div>
            </div>
            @endforeach
            <?php /*<div class="col-sm-6 col-md-3 sm-text-center mb-sm-30">
              <div class="team maxwidth400">
                <div class="thumb"><img class="img-fullwidth" src="{{url('public/frontend/images/team6.jpg')}}" alt=""></div>
                <div class="content border-1px p-15 bg-light clearfix">
                  <h4 class="name mt-0 text-theme-color-2">Dr. Smail Smith</h4>
                  <p class="mb-20">Lorem ipsum dolor sit amet, con amit sectetur adipisicing elit.</p>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <a class="btn btn-theme-colored btn-sm pull-right flip" href="#">view details</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 sm-text-center mb-sm-30">
              <div class="team maxwidth400">
                <div class="thumb"><img class="img-fullwidth" src="{{url('public/frontend/images/team3.jpg')}}" alt=""></div>
                <div class="content border-1px p-15 bg-light clearfix">
                  <h4 class="name mt-0 text-theme-color-2">Dr. Zakaria Jon</h4>
                  <p class="mb-20">Lorem ipsum dolor sit amet, con amit sectetur adipisicing elit.</p>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <a class="btn btn-theme-colored btn-sm pull-right flip" href="#">view details</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 sm-text-center">
              <div class="team maxwidth400">
                <div class="thumb"><img class="img-fullwidth" src="{{url('public/frontend/images/team5.jpg')}}" alt=""></div>
                <div class="content border-1px p-15 bg-light clearfix">
                  <h4 class="name mt-0 text-theme-color-2">Dr. Ismail Jon</h4>
                  <p class="mb-20">Lorem ipsum dolor sit amet, con amit sectetur adipisicing elit.</p>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <a class="btn btn-theme-colored btn-sm pull-right flip" href="#">view details</a>
                </div>
              </div>
            </div>*/ ?>

          </div>
        </div>
      </div>
    </section>

    <!-- Section: Testimonials -->
    <?php /*<section class="divider parallax layer-overlay overlay-white-9" data-bg-img="" data-parallax-ratio="0.7">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="pt-50">
              <div class="testimonial style1 owl-carousel-3col owl-nav-top" data-nav="true">
                <div class="item">
                  <div class="comment border-radius-15px">
                    <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-right">
                      <img class="img-circle" alt="" src="{{url('public/frontend/images/s3.jpg')}}">
                    </div>
                    <div class="patient-details text-right pull-right mr-20 mt-10">
                      <h5 class="">Jonathan Smith</h5>
                      <h6 class="title">kode inc.</h6>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="comment border-radius-15px">
                    <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-right">
                      <img class="img-circle" alt="" src="{{url('public/frontend/images/s1.jpg')}}">
                    </div>
                    <div class="patient-details text-right pull-right mr-20 mt-10">
                      <h5 class="">Jonathan Smith</h5>
                      <h6 class="title">kode inc.</h6>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="comment border-radius-15px">
                    <p>Lorem ipsum dolor sit ametconse ctetur adipisicing elitvolup tatem error sit qui dolorem facilis.</p>
                  </div>
                  <div class="content mt-20">
                    <div class="thumb pull-right">
                      <img class="img-circle" alt="" src="{{url('public/frontend/images/s2.jpg')}}">
                    </div>
                    <div class="patient-details text-right pull-right mr-20 mt-10">
                      <h5 class="">Jonathan Smith</h5>
                      <h6 class="title">kode inc.</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>*/ 
    use App\Models\Testimonial;
    $testimonials = Testimonial::where('show_on_hp', '1')->get();
    ?>
    <section class="divider parallax layer-overlay overlay-white-9" data-bg-img="" data-parallax-ratio="0.7">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="pt-50">
                  <div class="testimonial style1 owl-carousel-3col owl-nav-top" data-nav="true">
                    @foreach($testimonials as $testimonial)
                    <div class="item">
                      <div class="comment border-radius-15px">
                        <p>{{$testimonial->testimonial}}</p>
                      </div>
                      <div class="content mt-20">
                        <div class="thumb pull-right">
                          <img class="img-circle" alt="" src="{{url('public/uploads/testimonialImage/'.$testimonial->image)}}" width="100" height="50">
                        </div>
                        <div class="patient-details text-right pull-right mr-20 mt-10">
                          <h5 class="">{{$testimonial->name}}</h5>
                          <h6 class="title">{{$testimonial->company}}</h6>
                        </div>
                      </div>
                    </div>
                    @endforeach             
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    <!-- Section: Why Choose Us -->
    <section>
      <div class="container pb-40">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <h3 class="title line-height-1 line-bottom mt-0 mb-30"><i class="fa fa-thumb-tack text-theme-colored mr-10"></i>FAQ</h3>
              <?php 
                //$faqs = Faqs::all()->take(5)->where('status', 'A');
              ?>
              @php
                use App\Models\Faqs;
                $faqs = Faqs::all()->where('status', 'A');
              @endphp
              <?php $i=1; ?>
              @foreach($faqs as $faq)
       <div id="accordion1" class="panel-group accordion">
              
              
                <div class="panel">
                  <div class="panel-title"> <a class="@if($i==1) {{'active99'}} @else {{'collapsed'}} @endif" data-parent="#accordion1" data-toggle="collapse" href="#accordion{{$i+10}}" aria-expanded="false"> <span class="open-sub"></span>{{$faq->title}}</a> </div>
                  <div id="accordion{{$i+10}}" class="panel-collapse collapse" role="tablist" aria-expanded="false">
                    <div class="panel-content">
                      <p>{{$faq->description}}</p>
                    </div>
                  </div>
                </div>
                
                <?php /*<div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Hospital is Best?</a> </div>
                  <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Hospital is Best?</a> </div>
                  <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion14" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Hospital is Best?</a> </div>
                  <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>*/ ?>

      </div>
      <?php $i++; ?>
      @endforeach
            </div>
            <div class="col-md-7">
              <h3 class="title line-bottom line-height-1 mt-0 mb-30"><i class="fa fa-camera-retro text-theme-colored mr-10"></i>Our <span class="text-theme-colored">Gallery</span></h3>
              <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
                @php
                use App\Models\Hpgalleries;
                $galleries = Hpgalleries::all()->where('show_on_hp', '1');
              @endphp
              <?php $i=1; ?>
              @foreach($galleries as $gallery)
              @for($i=1;$i<=12;$i++)
              <?php 
                      switch($i){
                          case 1 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image1);}break;
                          case 2 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image2);}break;
                          case 3 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image3);}break;
                          case 4 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image4);}break;
                          case 5 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image5);}break;
                          case 6 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image6);}break;
                          case 7 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image7);}break;
                          case 8 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image8);}break;
                          case 9 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image9);}break;
                          case 10 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image10);}break;
                          case 12 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image11);}break;
                          case 11 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image12);}break;
                      }
              ?>
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{$url}}" class="img-fullwidth" style='width:100px;height:100px;'>
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endfor
                @endforeach
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <?php /*<div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/images/gallery-sm2.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm3.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/gallery/gallery-sm3.jpg"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm4.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/gallery/gallery-sm4.jpg"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm5.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm6.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm7.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm8.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm9.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href=""  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm10.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/gallery/gallery-sm10.jpg"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm11.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/gallery/gallery-sm11.jpg"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                  <div class="thumb">
                    <img alt="project" src="{{url('public/frontend/images/gallery-sm12.jpg')}}" class="img-fullwidth">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/gallery/gallery-sm12.jpg"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>*/ ?>
                <!-- Portfolio Item End -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @php
    use App\Models\News;
    $news = news::all()->where('status', 'A');
    @endphp
    <!-- Section: blog -->
    <section id="blog" class="bg-lighter">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">News</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              
            </div>
          </div>
        </div>

        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-3col">
              @foreach($news as $new)
                <div class="item">
                  <article class="post clearfix bg-white">
                    <div class="entry-header">
                      <div class="post-thumb thumb"> 
                        <img src="{{url('public/uploads/NewsImages/'.$new->image)}}" alt="" class="img-responsive img-fullwidth"> 
                      </div>                    
                      <?php /*<div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                          <li class="font-16 text-white font-weight-600">28</li>
                          <li class="font-12 text-white text-uppercase">Feb</li>
                        </ul>
                      </div>*/ ?>
                    </div>
                    <div class="entry-content p-15 pt-10 pb-10">
                      <div class="entry-meta media no-bg no-border mt-0 mb-10">
                        <div class="media-body pl-0">
                          <div class="event-content pull-left flip">
                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">{{$new->title}}</a></h4>
                            <?php /*<span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>*/ ?>
                          </div>
                        </div>
                      </div>
                      <p class="mt-5">{{$new->description}} <a class="text-theme-color-2 font-12 ml-5" href="{{url('/news/'.$new->slug)}}"> View Details</a></p>
                    </div>
                  </article>
                </div>
                @endforeach  
                <?php /*<div class="item">
                  <article class="post clearfix bg-white">
                    <div class="entry-header">
                      <div class="post-thumb thumb"> 
                        <img src="" alt="" class="img-responsive img-fullwidth"> 
                      </div>                    
                      <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                        <ul>
                          <li class="font-16 text-white font-weight-600">28</li>
                          <li class="font-12 text-white text-uppercase">Feb</li>
                        </ul>
                      </div>
                    </div>
                    <div class="entry-content p-15 pt-10 pb-10">
                      <div class="entry-meta media no-bg no-border mt-0 mb-10">
                        <div class="media-body pl-0">
                          <div class="event-content pull-left flip">
                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="#">Post title here</a></h4>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>                      
                          </div>
                        </div>
                      </div>
                      <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti<a class="text-theme-color-2 font-12 ml-5" href="#"> View Details</a></p>
                    </div>
                  </article>
                </div>
                <div class="item">
                  <article class="post clearfix bg-white">
                    <div class="entry-header">
                      <div class="post-thumb thumb"> 
                        <img src="" alt="" class="img-responsive img-fullwidth"> 
                      </div>                    
                      <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                        <ul>
                          <li class="font-16 text-white font-weight-600">28</li>
                          <li class="font-12 text-white text-uppercase">Feb</li>
                        </ul>
                      </div>
                    </div>
                    <div class="entry-content p-15 pt-10 pb-10">
                      <div class="entry-meta media no-bg no-border mt-0 mb-10">
                        <div class="media-body pl-0">
                          <div class="event-content pull-left flip">
                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="blog-single-left-sidebar.html">Post title here</a></h4>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                            <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                          </div>
                        </div>
                      </div>
                      <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti<a class="text-theme-color-2 font-12 ml-5" href="blog-single-left-sidebar.html"> View Details</a></p>
                    </div>
                  </article>
                </div>*/ ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Divider: Clients -->
    <section class="clients bg-theme-colored">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center">
              <div class="item"> <a href="#"><img src="images/clients/w1.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w2.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
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
