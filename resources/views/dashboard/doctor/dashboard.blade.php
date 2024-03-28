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
            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary ">
                        <div class="media" style="margin: 20px;">
                            <span class="mr-3">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <div class="media-body text-white">
                                <a href="" style="color: white;text-align: center">
                                    <p class="mb-1"><strong> Total Appointment</strong></p>
                                </a>
                                <h3 class="text-white" style="text-align: center"> </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary ">
                        <div class="media" style="margin: 20px;">
                            <span class="mr-3">
                                <i class="fa fa-wheelchair"></i>
                            </span>
                            <div class="media-body text-white">
                                <a href="" style="color: white;text-align: center">
                                    <p class="mb-1"><strong> Total Patient</strong></p>
                                </a>
                                <h3 class="text-white" style="text-align: center"></h3>
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
