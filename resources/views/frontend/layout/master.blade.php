@php
use App\Models\Navbar;
$navbars = navbar::all()->where('status', 'A');
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Medikal - Health & Medical HTML Template" />
<meta name="keywords" content=" clinic, dental, doctor, health, hospital, medical, medical theme, medicine, therapy" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>Famehealth - Health Care Solution</title>

<!-- Favicon and Touch Icons -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/images/favicon.png') }}">
<link href="public/frontend/images/apple-touch-icon.png" rel="icon">
<link href="public/frontend/images/apple-touch-icon-72x72.png" rel="icon" sizes="72x72">
<link href="public/frontend/images/apple-touch-icon-114x114.png" rel="icon" sizes="114x114">
<link href="public/frontend/images/apple-touch-icon-144x144.png" rel="icon" sizes="144x144">

<!-- Stylesheet -->
<link href="{{url('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('public/frontend/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('public/frontend/css/animate.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('public/frontend/css/css-plugin-collections.css')}}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{url('public/frontend/css/menuzord-skins/menuzord-boxed.css')}}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{url('public/frontend/css/style-main.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{url('public/frontend/css/preloader.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{url('public/frontend/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{url('public/frontend/css/responsive.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="public/frontend/css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{url('public/frontend/js/revolution-slider/css/settings.css')}}" rel="stylesheet" type="text/css"/>
<link  href="{{url('public/frontend/js/revolution-slider/css/layers.css')}}" rel="stylesheet" type="text/css"/>
<link  href="{{url('public/frontend/js/revolution-slider/css/navigation.css')}}" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="{{url('public/frontend/css/colors/theme-skin-red.css')}}" rel="stylesheet" type="text/css">

    @yield('css')
</head>

<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">

<?php /*<div class="body-overlay"></div>
<div id="side-panel" class="dark" data-bg-img="">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="javascript:void(0)"><i class="pe-7s-close font-36"></i></a></div>
    <a href="{{url('')}}"><img alt="logo" src="public/frontend/images/logo.png"></a>
    <div class="side-panel-nav mt-30">
      <div class="widget no-border">
        <nav>
          <ul class="nav nav-list">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('services')}}">Services</a></li>
            <li><a class="tree-toggler nav-header">Pages <i class="fa fa-angle-down"></i></a>
              <ul class="nav nav-list tree">
                <li><a href="{{url('about')}}">About</a></li>
                <li><a href="{{url('terms')}}">Terms</a></li>
                <li><a href="{{url('faq')}}">FAQ</a></li>
              </ul>
            </li>
            <li><a href="{{url('contact')}}">Contact</a></li>
          </ul>
        </nav>        
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="side-panel-widget mt-30">
      <div class="widget no-border">
        <ul>
          <li class="font-14 mb-5"> <i class="fa fa-phone text-theme-colored"></i> <a href="javascript:void(0)" class="text-gray">123-456-789</a> </li>
          <li class="font-14 mb-5"> <i class="fa fa-clock-o text-theme-colored"></i> Mon-Fri 8:00 to 2:00 </li>
          <li class="font-14 mb-5"> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="javascript:void(0)" class="text-gray">contact@famehealth.com</a> </li>
        </ul>      
      </div>
      <div class="widget">
        <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
          <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
      <p>Copyright &copy;2022 GoProAlpha</p>
    </div>
  </div>
</div>*/ ?>

<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img src="images/preloaders/1.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

<!-- Header -->

<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget no-border m-0">
              
              <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm sm-text-center mt-sm-15">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="https://twitter.com/"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="https://www.google.com/"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin text-white"></i></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-6">
          <?php /*<div id="side-panel-trigger" class="side-panel-trigger pull-right flip sm-pull-none mt-5">
              <a href="javascript:void(0)"><i class="fa fa-bars font-24 text-white"></i></a></div>*/ ?>

            


            <div class="widget no-border m-0">
            

              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
              
                <li>
                  <a href="{{url('helpdesk')}}" class="text-white">Help Desk</a>
                </li>
                <?php /*<li class="text-white">|</li>
                <li>
                  <a href="{{url('emergencyservices')}}" class="text-white"> Emergency Services </a>
                </li>*/ ?>
                <li class="text-white">|</li>
                <li>
                  <a class="text-white" href="{{url('appointment')}}">Appointment</a>
                </li>

                @if( (isset(Auth::guard('frontdoctor')->user()->id) && Auth::guard('frontdoctor')->user()->id != '')  )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/dashboard')}}">Dashboard</a></li>
                @elseif( ( isset(Auth::guard('frontpatient')->user()->id) && Auth::guard('frontpatient')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontpatient/dashboard')}}">Dashboard</a></li>
                @elseif( ( isset(Auth::guard('fronthakeem')->user()->id) && Auth::guard('fronthakeem')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('fronthakeem/dashboard')}}">Dashboard</a></li>
                @elseif( ( isset(Auth::guard('frontlabority')->user()->id) && Auth::guard('frontlabority')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontlabority/dashboard')}}">Dashboard</a></li>
                @elseif( ( isset(Auth::guard('frontpharmacy')->user()->id) && Auth::guard('frontpharmacy')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontpharmacy/dashboard')}}">Dashboard</a></li>
                @endif


                @if( (isset(Auth::guard('frontdoctor')->user()->id) && Auth::guard('frontdoctor')->user()->id != '')  )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a></li>
                @elseif( ( isset(Auth::guard('frontpatient')->user()->id) && Auth::guard('frontpatient')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a></li>
                @elseif( ( isset(Auth::guard('fronthakeem')->user()->id) && Auth::guard('fronthakeem')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a></li>
                @elseif( ( isset(Auth::guard('frontlabority')->user()->id) && Auth::guard('frontlabority')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a></li>
                @elseif( ( isset(Auth::guard('frontpharmacy')->user()->id) && Auth::guard('frontpharmacy')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a></li>          
                @else( !isset(Auth::guard('frontdoctor')->user()->id) && !isset(Auth::guard('fronthakeem')->user()->id)  && !isset(Auth::guard('frontpatient')->user()->id) && !isset(Auth::guard('frontlabority')->user()->id) && !isset(Auth::guard('frontpharmacy')->user()->id))
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor')}}">Login</a>  </li>
                @endif

                
                


                <?php /*@if( (isset(Auth::guard('frontdoctor')->user()->id) && Auth::guard('frontdoctor')->user()->id != '')  )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontdoctor/dashboard')}}">Dashboard</a></li>
                  
                 @endif
                 <li class="text-white">|</li>
                 <li>
                @if( (isset(Auth::guard('frontdoctor')->user()->id) && Auth::guard('frontdoctor')->user()->id != ''))
                  <a class="text-white" href="{{url('frontdoctor/logout')}}">Logout</a>
                @endif 
                @if( !isset(Auth::guard('frontdoctor')->user()->id) && !isset(Auth::guard('fronthakeem')->user()->id)  && !isset(Auth::guard('frontpatient')->user()->id))
                  <a class="text-white" href="{{url('frontdoctor')}}">Login</a>
                @endif
                </li>

                
                @if( ( isset(Auth::guard('frontpatient')->user()->id) && Auth::guard('frontpatient')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('frontpatient/dashboard')}}">Dashboard</a></li>
                  
                @endif  
                <li class="text-white">|</li>
                <li>
                  @if(( isset(Auth::guard('frontpatient')->user()->id) && Auth::guard('frontpatient')->user()->id != '') )
                    <a class="text-white" href="{{url('frontpatient/logout')}}">Logout</a>
                  @endif  
                </li>

                
                @if( ( isset(Auth::guard('fronthakeem')->user()->id) && Auth::guard('fronthakeem')->user()->id != '') )
                  <li class="text-white">|</li>
                  <li><a class="text-white" href="{{url('fronthakeem/dashboard')}}">Dashboard</a></li>
                  
                @endif  
                <li class="text-white">|</li>
                <li>
                  @if(( isset(Auth::guard('fronthakeem')->user()->id) && Auth::guard('fronthakeem')->user()->id != '') )
                    <a class="text-white" href="{{url('fronthakeem/logout')}}">Logout</a>
                  @endif  
                </li>*/ ?>

              </ul>

              


            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    

    <?php /*<div class="header-middle p-0 bg-lightest xs-text-center">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-5">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="{{url('')}}"><img src="public/frontend/images/logo.png" alt=""></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-mobile text-theme-colored font-42 mt-5 sm-display-block"></i></li>
                <li>
                  <a href="javascript:void(0)" class="font-12 text-gray text-uppercase">Call us today!</a>
                  <h5 class="font-14 m-0"> +(012) 345 6789</h5>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                <li>
                  <a href="javascript:void(0)" class="font-12 text-gray text-uppercase">We are open!</a>
                  <h5 class="font-13 text-black m-0"> Mon-Fri 8:00-16:00</h5>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>*/ ?>
    
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-light">
        <div class="container">
          <nav id="menuzord" class="menuzord blue bg-light">
          <?php /*<ul class="menuzord-menu">
              <li class="active"><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('appointment')}}">Appointments</a></li>
              <li><a href="{{url('hakeemonline')}}">Hakeem Online</a></li>
              <li><a href="{{url('tibbenabvi')}}">Tibbe Nabvi</a></li>
              <li><a href="{{url('labs')}}">Labs</a></li>
              <li><a href="{{url('pharmacy')}}">Pharmacy</a></li>
              <li><a href="{{url('doctor')}}">Doctor</a></li>
              <li><a href="{{url('department')}}">Departments</a></li>
            </ul>*/ ?>
            @php
              $navbars = navbar::where(['status'=>'A', 'parent'=>'0'])->orderBy('sort', 'ASC')->get();
            @endphp
            <ul class="menuzord-menu">
              @foreach($navbars as $navbar)
              <li>
                <?php 
                  $typelink = '';
                  if($navbar->type == 0){
                    $typelink = $navbar->slug;
                  }else{
                    $typelink = '';
                  }
                
                ?>
                  <a href="{{url($typelink)}}">{{$navbar->title}}</a>
                  <?php 
                      $type ='';
                      switch($navbar->type){
                          case 'l' : {$type = 'laboratory';}break;
                          case 'd' : {$type = 'doctor';}break;
                          case 'p' : {$type = 'pharmacy';}break;
                      } 
                      $navmainid = $navbar->id;
                      $navSub1Exist = DB::table('navbars')->where('parent', $navmainid)->get();
                      if($navSub1Exist->count() > 0){?>
                        <ul class="dropdown">
                        <?php foreach($navSub1Exist as $navsub1){?>
                                 <li><a href="{{url($type.'/'.$navsub1->slug)}}"><i class="fa fa-list-ul"></i> {{$navsub1->title}}</a></li>
                        <?php }?>                
                        </ul>
                  <?php } ?>
              </li>
              @endforeach
              <li>
                <a href="javascript:void(0)">Registration</a>
                <ul class="dropdown">
                  <li><a href="{{url('doctorRegistration')}}"><i class="fa fa-list-ul"></i> Doctor Registration</a></li>
                  <li><a href="{{url('hakeemRegistration')}}"><i class="fa fa-list-ul"></i> Hakeem Registration</a></li>
                  <li><a href="{{url('laboratoryRegistration')}}"><i class="fa fa-list-ul"></i> Laboratory Registration</a></li>
                  <li><a href="{{url('pharmacyRegistration')}}"><i class="fa fa-list-ul"></i> Pharmacy Registration</a></li>
                </ul>
              </li>
            </ul>

            <div class="pull-right flip hidden-sm hidden-xs">
              <div class="widget no-border m-0">
                <div class="search-form-wrapper">
                  <form id="searchform" class="m-0 mt-10" method="get" action="{{url('searchResult')}}">
                    <input class="" type="text" name="s" id="searchinput" data-height="38px" value="" onblur="if(this.value == '') { this.value ='Enter your search'; }" onfocus="if(this.value =='Enter your search') { this.value = ''; }"  >
                    <label>
                      <input type="submit" data-height="34px">
                    </label>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>


        <!-- Container Fluid-->
            @yield('content')
        <!---Container Fluid-->
    
        <!-- Footer -->
        <footer id="footer" class="footer pb-0" data-bg-img="public/frontend/images/footer-bg.png" data-bg-color="#25272e">
            <div class="container pt-90 pb-60">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                <div class="widget dark"> <a href="{{url('')}}"><img alt="" src="public/frontend/images/logo.png"></a>
                    <p class="font-12 mt-10 mb-10">Medikal is a library of health and medical templates with predefined web elements which helps you to build your medical templates best site</p>
                    <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="javascript:void(0)">Read more</a>
                    <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm mt-20">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-skype"></i></a></li>
                    <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">Latest News</h5>
                    <div class="latest-posts">
                    <article class="post media-post clearfix pb-0 mb-10">
                        <a class="post-thumb" href="javascript:void(0)"><img src="" alt=""></a>
                        <div class="post-right">
                        <h5 class="post-title mt-0 mb-5"><a href="javascript:void(0)">Sustainable Construction</a></h5>
                        <p class="post-date mb-0 font-12"></p>
                        </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                        <a class="post-thumb" href="javascript:void(0)"><img src="" alt=""></a>
                        <div class="post-right">
                        <h5 class="post-title mt-0 mb-5"><a href="javascript:void(0)">Industrial Coatings</a></h5>
                        <p class="post-date mb-0 font-12"></p>
                        </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                        <a class="post-thumb" href="javascript:void(0)"><img src="" alt=""></a>
                        <div class="post-right">
                        <h5 class="post-title mt-0 mb-5"><a href="javascript:void(0)">Storefront Installations</a></h5>
                        <p class="post-date mb-0 font-12"></p>
                        </div>
                    </article>
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">Quick Contact</h5>
                    <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="{{url('processContactUs')}}" method="post">
                          <div class="form-group">
                              <input name="cemail" id="cemail" class="form-control" type="email" required="" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                              <textarea name="cmessage" id="cmessage" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                              <input type='submit' name='submit' value='Send Message33' id='footer_quick_contact_form_btn' class="btn btn-default btn-transparent btn-xs btn-flat mt-0" >
                              <div id='cmsg'></div>
                          </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                    /*$("#footer_quick_contact_form").validate({
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
                    });*/

                    
                  </script>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">Opening Hours</h5>
                    <div class="opening-hours">
                    <ul class="list list-border">
                        <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Mond - Tuesday :</span>
                        <div class="value pull-right"> 9.00 am - 10.00 pm </div>
                        </li>
                        <li class="clearfix"> <span class="text-theme-color-2"><i class="fa fa-clock-o mr-5"></i> Wednes - Thurs </span>
                        <div class="value pull-right text-white"> 10.00 am - 8.00 pm </div>
                        </li>
                        <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Sat - Monday :</span>
                        <div class="value pull-right"> 9.00 am - 10.00 pm </div>
                        </li>
                        <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Sunday :</span>
                        <div class="value pull-right"> <span class="text-highlight bg-theme-colored text-white">Closed</span>  </div>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="horizontal-contact-widget mt-30 pt-30 text-center">
                    <div class="col-sm-12 col-sm-4">
                    <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                        <h5 class="text-white">Call Us</h5>
                        <p><a href="javascript:void(0)"></a></p>
                    </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                    <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                        <h5 class="text-white">Address</h5>
                        <p></p>
                    </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                    <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                        <h5 class="text-white">Email</h5>
                        <p><a href="javascript:void(0)"></a></p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline styled-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-30 mb-10">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a> </li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a> </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a> </li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a> </li>
                    <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a> </li>
                </ul>
                </div>
            </div>
            </div>
            <div class="container-fluid bg-theme-colored p-20">
            <div class="row text-center">
                <div class="col-md-12">
                <p class="text-white font-11 m-0">Copyright &copy;2022 GoProAlpha. All Rights Reserved</p>
                </div>
            </div>
            </div>
        </footer>
        <a class="scrollToTop" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a></div>
        <!-- end wrapper -->

    </body>
<!-- external javascripts -->

</div>
<script src="{{url('public/frontend/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{url('public/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{url('public/frontend/js/bootstrap.min.js')}}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{url('public/frontend/js/jquery-plugin-collection.js')}}"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{url('public/frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{url('public/frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="{{url('public/frontend/js/custom.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#disable-preloader').click();
    });
</script>
<script>
   $(function() {

      $("#searchinput").autocomplete({                
                source: function (request, response) {
                    //console.log('call');
                    console.log(request.term);
                    $.ajax({
                        type: "post",
                        url: "{{url('search')}}",
                        dataType: "json",
                        data:{
                            "_token": "{{ csrf_token() }}", 
                            "s_key": request.term
                        },
                        success: function (data) {
                            console.log('success');
                            console.log(data);
                            response($.map(data, function (item) {  
                                console.log('success item');
                                console.log(item);
                                //console.log(item.doctors[0].doctor_fullname);                        
                                //var AC = new Object();
                                //$.each(item, function(k, v){
                                    //autocomplete default values REQUIRED
                                    //AC.label = v.doctor_fullname;
                                  // AC.value = v.doctor_fullname;    
                                //});    
                                
                                return item;
                                
                            })/**/
                            //return data;
                            );       
                        },error:function(data){
                            console.log('error');
                            console.log(data.responseText);
                        }                                             
                    });
                },
                minLength: 3,
                select: function (event, ui) { 
                    console.log(ui);   
                    $('#searchform').submit();                
                }                    
            }).data('ui-autocomplete')._renderItem = function(ul, item){
            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };//$("#searchinput").autocomplete
     }); 

      $("#footer_quick_contact_form_btn").on("click", function(e){
          e.preventDefault();
          //alert('ev r');
          var form = $('#footer_quick_contact_form');
          var cemail = $('#cemail').val();
          var cmessage = $('#cmessage').val();
          var formdata = form.serialize();
            $.ajax({
                method: "post",
                url: "{{url('processContactUs')}}",
                data:{ "_token": "{{ csrf_token() }}", "cemail": cemail, "cmessage": cmessage },
                dataType: "json",
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    $('#cmsg').show().html('Submitted Successflly').css('color', 'green').fadeOut(9000);
                },error:function(data){
                    console.log('error');
                    console.log(data.responseText);
                }                                             
            });
      });


    //processContactUs
        var form = $('#---------footer_quick_contact_form_btn-9----------------------');
        form.on('click', function(e){
            e.preventDefault();
            e.preventDefault();
            var formdata = form.serialize();
            $.ajax({
                method: "post",
                url: "{{url('processContactUs')}}",
                data:{ "_token": "{{ csrf_token() }}", "form": form },
                dataType: "json",
                success: function (data) {
                    console.log('success c form');
                    console.log(data);
                   
                },error:function(data){
                    console.log('error');
                    console.log(data.responseText);
                }                                             
            });

        });
        

   
</script>
@yield('js')
</html>
