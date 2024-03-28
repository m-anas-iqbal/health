@extends('layout.master')
@section('doctors')
    active
@endsection
@section('content')
    <!--**********************************
                                                                                Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Doctor Profile</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    @if (Auth::guard()->user()->role == 12)
                        <a href="{{ route('admin.doctoredit', $doctors->id) }}" class="btn btn-primary"> <i
                                class="la la-pencil"></i> Update</a>
                    @endif
                    @if (Auth::guard()->user()->role == 1)
                    <a href="{{ route('doctor.doctoredit', $doctors->id) }}" class="btn btn-primary"> <i
                            class="la la-pencil"></i> Update</a>
                @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box" style="background-image: url();">
                                    <div class="profile-photo">
                                        <img src="{{ asset('uploads/DoctorImagesSave/' . $doctors->doctor_profileImage) }}"
                                            width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $doctors->doctor_fullname }}</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Total Appointment</span> <strong
                                            class="text-muted">25
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">New Appointment</span> <strong
                                            class="text-muted">20</strong></li>

                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Total Patient</span> <strong class="text-muted">210
                                        </strong></li>

                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">about me</h2>
                                </div>

                                <div class="card-body pb-0">
                                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Date Of Birth</strong>
                                            <span class="mb-0">
                                                @if ($doctors->doctor_dob != null)
                                                    {{ date('d F Y', strtotime($doctors->doctor_dob)) }}
                                                @endif
                                            </span>
                                        </li>

                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Gender</strong>
                                            <span class="mb-0">{{ $doctors->doctor_gender }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Education</strong>
                                            <span class="mb-0">{{ $doctors->doctor_degree }}</span>
                                        </li>

                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Experience</strong>
                                            <span class="mb-0">{{ $doctors->doctor_experience }}</span>
                                        </li>


                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Country</strong>
                                            <span class="mb-0">{{ $doctors->doctor_country }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>City</strong>
                                            <span class="mb-0">{{ $doctors->doctor_city }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>State</strong>
                                            <span class="mb-0">{{ $doctors->doctor_state }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="card-title">Interest </h4>
                                </div>
                                <div class="card-body">
                                    <h6>Photoshop
                                        <span class="pull-right">85%</span>
                                    </h6>
                                    <div class="progress ">
                                        <div class="progress-bar bg-danger progress-animated"
                                            style="width: 85%; height:6px;" role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Code editor
                                        <span class="pull-right">90%</span>
                                    </h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-animated" style="width: 90%; height:6px;"
                                            role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Illustrator
                                        <span class="pull-right">65%</span>
                                    </h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-success progress-animated"
                                            style="width: 65%; height:6px;" role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link active show">About Me</a></li>

                                    </ul>

                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Name <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $doctors->doctor_fullname }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Email <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $doctors->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Marital Status <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $doctors->doctor_martialStatus }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Phone <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>+92 {{ $doctors->doctor_phone }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Doctor Type <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>
                                                            @if (!empty($doctorTypes))
                                                                @foreach ($doctorTypes as $doctorType)
                                                                    @if ($doctorType->id == $doctors->doctor_doctorType_id)
                                                                        {{ $doctorType->doctorType_name }}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                                <h4 class="text-primary mb-4">Course</h4>
                                                @if (!empty($courseforms))
                                                    @foreach ($courseforms as $courseform)
                                                        @if (in_array($courseform->id, $doctorcourseForm))
                                                            <a href="javascript:void()"
                                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $courseform->course_name }}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                                <h4 class="text-primary mb-4">Specialties</h4>
                                                @if (!empty($specialties))
                                                    @foreach ($specialties as $specialtie)
                                                        @if (in_array($specialtie->id, $doctorspecialties))
                                                            <a href="javascript:void()"
                                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $specialtie->specialty_name }}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                                <h4 class="text-primary mb-4">Hospital</h4>
                                                @if (!empty($hospitals))
                                                    @foreach ($hospitals as $hospital)
                                                        @if (in_array($hospital->id, $doctorhospital))
                                                            <a href="javascript:void()"
                                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $hospital->hospital_name }}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
                                                                                Content body end
                                                                            ***********************************-->
    @endsection
