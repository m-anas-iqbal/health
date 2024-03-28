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
                        <h4>Update Section 2</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.header') }}">Header</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Section 2</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Section 1 Info</h5>
                        </div>

                        <div class="card-body">
                            <form id="addsection2" action="{{ route('admin.section2update',1) }} " method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading Name</label>
                                            <input type="text" name="heading" value="{{$section2s->heading}}" id="heading"
                                                class="
                                                form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="12" name="description"
                                                style="resize: none">{{$section2s->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Button Name</label>
                                            <input type="text" name="btntext" value="{{$section2s->btntext}}" id="btntext" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Button Link</label>
                                            <input type="url" name="btnlink" value="{{$section2s->btnlink}}" id="btnlink" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image 1</label>
                                            <input type="file" name="image1" id="image1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image 2</label>
                                            <input type="file" name="image2" id="image2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
    
                                            <h4>Image 1</h4><br>
                                            <img src="{{ asset('uploads/Section2ImagesSave/' . $section2s->image1) }}" width="250" alt="">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
    
                                            <h4>Image 2</h4><br>
                                            <img src="{{ asset('uploads/Section2ImagesSave/' . $section2s->image2) }}" width="250" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
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
        $("#addsection2").validate({
            rules: {
                heading: {
                    required: true,
                },
                description: {
                    required: true,
                },

            },
            messages: {
                heading: '<span class="text-danger ">Heading is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
            }
        });
    </script>
@endsection
