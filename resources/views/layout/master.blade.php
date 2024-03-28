<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('public/assets/img/logo/logo.png') }}" rel="icon">
    <title>Fame Health</title>
    <link href="{{ asset('public/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/assets/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Datatable -->
    <link href="{{ asset('public/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    @yield('css')
</head>

<body id="page-top">


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="javascript:void(0)" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('public/assets/images/logo-white.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('public/assets/images/logo-text-white.png') }}" alt="">
                <img class="brand-title" src="{{ asset('public/assets/images/logo-text-white.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">

                            @if (Auth::guard()->user()->role == 12)
                                <li class="nav-item dropdown header-profile">
                                    Welcome: {{Auth::guard()->user()->name}}
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('admin.logout') }}" id="logout-form"
                                                method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::guard()->user()->role == 1)
                                <li class="nav-item dropdown header-profile">
                                Welcome: {{Auth::guard()->user()->doctor_fullname}}
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('doctor.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('doctor.logout') }}" id="logout-form"
                                                method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::guard()->user()->role == 2)
                                <li class="nav-item dropdown header-profile">
                                
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('patient.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('patient.logout') }}" id="logout-form"
                                                method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::guard()->user()->role == 3)
                                <li class="nav-item dropdown header-profile">
                                    Welcome: {{Auth::guard()->user()->hospital_name}}
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('hospital.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('hospital.logout') }}" id="logout-form"
                                                method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::guard()->user()->role == 4)
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('lab.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('lab.logout') }}" id="logout-form" method="post">
                                                @csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::guard()->user()->role == 5)
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="{{ asset('public/assets/images/default.png') }}" width="20" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dawakhana.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                            <form action="{{ route('dawakhana.logout') }}" id="logout-form"
                                                method="post">@csrf</form>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    @if (Auth::guard()->user()->role == 12)
                        <li><a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('admin.doctor') }}" aria-expanded="false">
                                <i class="fa fa-user-md"></i>
                                <span class="nav-text">Doctor</span>
                            </a>
                        </li> 
                        <li>
                            <a class="" href="{{ route('admin.hakeem') }}" aria-expanded="false">
                                <i class="fa fa-user-md"></i>
                                <span class="nav-text">Hakeem</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.labority') }}" aria-expanded="false">
                                <i class="fa fa-user-md"></i>
                                <span class="nav-text">Labority</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.pharmacy') }}" aria-expanded="false">
                                <i class="fa fa-user-md"></i>
                                <span class="nav-text">Pharmacy</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.patient') }}" aria-expanded="false">
                                <i class="fa fa-wheelchair"></i>
                                <span class="nav-text">Patient</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.appointment') }}" aria-expanded="false">
                                <i class="fa fa-calendar"></i>
                                <span class="nav-text">Appointment</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.hospital') }}" aria-expanded="false">
                                <i class="fas fa-hospital"></i>
                                <span class="nav-text">Hospital</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.department') }}" aria-expanded="false">
                                <i class="fas fa-building"></i>
                                <span class="nav-text">Departments</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.nurse') }}" aria-expanded="false">
                                <i class="fa-solid fa-user-nurse"></i>
                                <span class="nav-text">Nurse</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.dawakhanahakeem') }}" aria-expanded="false">
                                <i class="fa-solid fa-house-chimney-crack"></i>
                                <span class="nav-text">Dawakhanahakeem</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.lab') }}" aria-expanded="false">
                                <i class="fa-solid fa-flask"></i>
                                <span class="nav-text">Labs</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('admin.specialty') }}" aria-expanded="false">
                                <i class="la la-users"></i>
                                <span class="nav-text">Specialty</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('admin.doctortype') }}" aria-expanded="false">
                                <i class="fa-solid fa-list"></i>
                                <span class="nav-text">Doctor Type</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('admin.courseform') }}" aria-expanded="false">
                                <i class="la la-graduation-cap"></i>
                                <span class="nav-text">Course Form</span>
                            </a>
                        </li> 
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-globe"></i>
                                <span class="nav-text">Website</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('admin.header') }}">Header</a></li>
                                <li><a href="{{ route('admin.blog') }}">Bolgs</a></li>
                                <li><a href="{{ route('admin.footer') }}">Footer</a></li>
                                <li><a href="{{ route('admin.hpmainslider') }}">hp main silder</a></li>
                                <li><a href="{{ route('admin.navbar') }}">Navbar</a></li>
                                <li><a href="{{ route('admin.news') }}">News</a></li>
                                <li><a href="{{ route('admin.faq') }}">FAQs</a></li>
                                <li><a href="{{ route('admin.gallery') }}">HP Gallery</a></li>
                                <li><a href="{{ route('admin.hpmessage') }}">HP Message</a></li>
                                <li><a href="{{ route('admin.hpservice') }}">HP Service</a></li>
                                <li><a href="{{ route('admin.testimonial') }}">hp testimonial</a></li>
                            </ul>

                        </li>
                    @endif

                    @if (Auth::guard()->user()->role == 1)
                        <li><a class="" href="{{ route('doctor.dashboard') }}" aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('doctor.profile') }}" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('doctor.appointment') }}"
                                aria-expanded="false">
                                <i class="fa fa-calendar"></i>
                                <span class="nav-text">Appointment</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard()->user()->role == 2)
                        <li><a class="" href="{{ route('patient.dashboard') }}" aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('patient.profile') }}" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('patient.appointment') }}"
                                aria-expanded="false">
                                <i class="fa fa-calendar"></i>
                                <span class="nav-text">Appointment</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard()->user()->role == 3)
                        <li><a class="" href="{{ url('hospital/dashboard') }}"
                                aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ url('hospital/profile') }}" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{ route('hospital.nurse') }}" aria-expanded="false">
                                <i class="fa-solid fa-user-nurse"></i>
                                <span class="nav-text">Nurse</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard()->user()->role == 4)
                        <li><a class="" href="{{ route('lab.dashboard') }}" aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('lab.profile') }}" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                        <li><a class="" href="{{ route('lab.profile') }}" aria-expanded="false">
                                <i class="fa fa-flask"></i>
                                <span class="nav-text">Add Lab</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard()->user()->role == 5)
                        <li><a class="" href="{{ route('dawakhanahakeem.dashboard') }}"
                                aria-expanded="false">
                                <i class="fa-solid fa-house-medical"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li><a class="" href="{{ route('dawakhanahakeem.profile') }}" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                        {{-- <li><a class="" href="{{ route('dawakhanahakeem.medicines') }}" aria-expanded="false">
                                <i class="fa fa-medkit"></i>
                                <span class="nav-text">Add Medicines</span>
                            </a>
                        </li> --}}
                    @endif

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!-- Container Fluid-->
        <?php //var_dump(Auth::guard()->user()) ?>
        @yield('content')
        <!---Container Fluid-->
    </div>
    <!-- Footer -->
    <div class="footer">
        <div class="copyright">
            <p>Powered By <a href="http://kodevglobal.com/">Kodev Global</a> Pvt Ltd {{ date('Y') }}</p>
            <span>
        </div>
    </div>


    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->




</body>

<!-- Required vendors -->
<script src="{{ asset('public/assets/vendor/global/global.min.js ') }}"></script>
<script src="{{ asset('public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js ') }}"></script>
<script src="{{ asset('public/assets/js/custom.min.js ') }}"></script>
<script src="{{ asset('public/assets/js/dlabnav-init.js ') }}"></script>

<!-- Datatable -->
<script src="{{ asset('public/assets/vendor/datatables/js/jquery.dataTables.min.js ') }}"></script>
<script src="{{ asset('public/assets/js/plugins-init/datatables.init.js ') }}"></script>

<!-- Svganimation scripts -->
<script src="{{ asset('public/assets/vendor/svganimation/vivus.min.js ') }}"></script>
<script src="{{ asset('public/assets/vendor/svganimation/svg.animation.js ') }}"></script>
<script src="{{ asset('public/assets/js/styleSwitcher.js ') }}"></script>
@yield('js')

</html>
