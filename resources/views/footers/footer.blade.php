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
                        <h4>Footer</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Footer</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div id="del_blog" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row tab-content">

                        <div class="col-xl-6 col-xxl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Logo</h4>
                                    <a href="{{ route('admin.footereditlogo', $footers->id) }}" class="btn btn-primary">
                                        <i class="la la-pencil"></i> Update</a>
                                </div>

                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <img src="{{ asset('uploads/FooterImages/' . $footers->logo) }}" width="100"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Description</h4>
                                    <a href="{{ route('admin.footereditdescription', $footers->id) }}"
                                        class="btn btn-primary"> <i class="la la-pencil"></i> Update</a>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <p>{{ $footers->description }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Socail Media </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <a href="{{ route('admin.socialmedia') }}" class="btn btn-primary"> <i
                                                    class="la la-plus"></i> Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6 col-xxl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Quick Link </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <a href="{{ route('admin.quicklink') }}" class="btn btn-primary"> <i
                                                    class="la la-plus"></i> Add</a>
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
