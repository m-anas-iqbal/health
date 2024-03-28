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
                        <h4>View Service</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hpservice') }}">All Services</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">View Services</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Service Info</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"></label>
                                        <h4>Main Heading : <strong> {{ $hpservices->mainheading }}</strong> </h4>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <p>{{ $hpservices->description }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading1 }}</h2><br>
                                      <p>{{ $hpservices->description1 }}</p><br>

                                       
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading2 }}</h2><br>
                                      <p>{{ $hpservices->description2 }}</p><br>
                                        <
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading3 }}</h2><br>
                                      <p>{{ $hpservices->description3 }}</p><br>

                                      
                                    </div>
                                </div>


                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading4 }}</h2><br>
                                      <p>{{ $hpservices->description4 }}</p><br>

                                      
                                     
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading5 }}</h2><br>
                                      <p>{{ $hpservices->description5 }}</p><br>

                                      
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <h2>{{ $hpservices->heading6 }}</h2><br>
                                      <p>{{ $hpservices->description6 }}</p><br>

                                      
                                     
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#addblog").validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                },

            },
            messages: {
                title: '<span class="text-danger ">Title is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
            }
        });
    </script>
@endsection
