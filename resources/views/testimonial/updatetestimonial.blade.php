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
                        <h4>Update testimonial</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.testimonial') }}">All Testimonial</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Testimonial</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Testimonial Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addtestimonial" action="{{ route('admin.testimonialupdate', $testimonials->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" id="name" value="{{ $testimonials->name }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" name="company_name" id="company_name" value="{{ $testimonials->company }}" class="form-control">
                                        </div>
                                    </div>

                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Testimonial</label>
                                            <textarea class="form-control" rows="12" name="testimonial"
                                                style="resize: none">{{ $testimonials->testimonial }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <img src="{{URL('public/uploads/testimonialImage',$testimonials->image)}}" width="200" height="200">
                                            

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value='1' <?php if($testimonials->status == '1') echo ' selected'; ?>>Active</value>
                                                <option value='0' <?php if($testimonials->status == '0') echo ' selected'; ?>>Disabled</value>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Show on Home Page</label>
                                            <select name="show_on_hp" class="form-control">
                                                <option value='1' <?php if($testimonials->show_on_hp == '1') echo ' selected'; ?>>Showed on Home Page</value>
                                                <option value='0' <?php if($testimonials->show_on_hp == '0') echo ' selected'; ?>>Not Show on Home Page</value>
                                            </select>
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
        var messageimage = "{{ $testimonials->Image}}";
        var messagemage_status = false;
        if(messageimage == '') messagemage_status = true;
        //alert(bimage_status);
        $("#addtestimonial").validate({
            rules: {
                : {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required:messagemage_status,
                }    
            },
            messages: {
                title: '<span class="text-danger ">Title is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
                image:'<span class="text-danger">Blog image is required.</span>',
            }
        });
    </script>
@endsection
