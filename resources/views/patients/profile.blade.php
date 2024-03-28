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
                        <h4>Patient Profile</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('admin.patientedit', $patients->id) }}" class="btn btn-primary"> <i class="la la-pencil"></i> Update</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box" style="background-image: url();">
                                    <div class="profile-photo">
                                        <img src="{{ asset('uploads/PatientProfileImages/' . $patients->patient_profileImage) }}"
                                            width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $patients->patient_fullname }}</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    {{-- <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Total Appointment</span> <strong
                                            class="text-muted">4
                                        </strong></li> --}}
                                    {{-- <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">New Appointment</span> <strong
                                            class="text-muted">2</strong></li> --}}

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
                                                {{ date('d F Y', strtotime($patients->patient_dob)) }}</span>
                                        </li>

                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Gender</strong>
                                            <span class="mb-0">{{ $patients->patient_gender }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Blood Group</strong>
                                            <span class="mb-0">{{ $patients->patient_bloodGroup }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Weight</strong>
                                            <span class="mb-0">{{ $patients->patient_weight }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Height Feet</strong>
                                            <span class="mb-0">{{ $patients->patient_height_Feet }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Height Inches</strong>
                                            <span class="mb-0">{{ $patients->patient_height_Inches }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Inherited Desease</strong>
                                            <span class="mb-0">{{ $patients->patient_InheritedDesease }}</span>
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
                                            <span class="mb-0">{{ $patients->patient_country }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>City</strong>
                                            <span class="mb-0">{{ $patients->patient_city }}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>State</strong>
                                            <span class="mb-0">{{ $patients->patient_state }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                     
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
                                                        <span>{{ $patients->patient_fullname }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Email <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $patients->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Marital Status <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>{{ $patients->patient_martialStatus }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Address <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{ $patients->patient_address }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Phone <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        <span>+92 {{ $patients->patient_phone }}</span>
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

            </div>
        </div>
        <!--**********************************
                                                                        Content body end
                                                                    ***********************************-->
    @endsection
