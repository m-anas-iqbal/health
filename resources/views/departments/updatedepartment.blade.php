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
                        <h4>Update department</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.department') }}">All departments</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update department</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">department Info</h5>
                        </div>
                        <?php 
                            //echo '<pre>';
                            //print_r($departments);
                            //die;
                        ?>
                        <div class="card-body">
                            <form id="adddepartment" action="{{ route('admin.departmentupdate', $departments->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Title Name</label>
                                            <input type="text" name="title" id="title" value="{{ $departments->title }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <img src='{{url("public/uploads/departmentsimages/$departments->image")}}'>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="12" name="description"
                                                style="resize: none">{{ $departments->description }}</textarea>
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
        var departmentimage = "{{ $departments->image }}";
        var bimage_status = false;
        if(departmentimage == '') bimage_status = true;
        //alert(bimage_status);
        $("#adddepartment").validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required:bimage_status,
                }    
            },
            messages: {
                title: '<span class="text-danger ">Title is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
                image:'<span class="text-danger">department image is required.</span>',
            }
        });
    </script>
@endsection
