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
                        <h4>Add Message</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hpmessage') }}">All Messages</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Message</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Message Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addhpmessage" action="{{ route('admin.hpmessagestore') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Main Heading</label>
                                            <input type="text" name="main_heading" id="main_heading" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="12" name="description"
                                                style="resize: none"></textarea>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image 1</label>
                                            <input type="file" name="image_1" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                            <label class="form-label"> Heading 1</label>
                                            <input type="text" name="heading_1" id="heading_1" class="form-control">
                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                            <label class="form-label"> sort 1</label>
                                            <input type="text" name="sort_1" id="sort_1" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Description 1</label>
                                             <textarea class="form-control" rows="12" name="description_1"
                                                style="resize: none"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image 2</label>
                                            <input type="file" name="image_2" id="image_2" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                            <label class="form-label"> sort 2</label>
                                            <input type="text" name="sort_2" id="sort_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                     <div class="form-group">
                                            <label class="form-label"> Heading 2</label>
                                            <input type="text" name="heading_2" id="heading_2" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Description 2</label>
                                             <textarea class="form-control" rows="12" name="description_2"
                                                style="resize: none"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image 3</label>
                                            <input type="file" name="image_3" id="image_3" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                            <label class="form-label"> sort 3</label>
                                            <input type="text" name="sort_3" id="sort_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                      <div class="form-group">
                                            <label class="form-label"> Heading 3</label>
                                            <input type="text" name="heading_3" id="heading_3" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Description 3</label>
                                             <textarea class="form-control" rows="12" name="description_3"
                                                style="resize: none"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value='1'>Active</value>
                                                <option value='0'>Disabled</value>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Show on Home Page</label>
                                            <select name="show_on_hp" class="form-control">
                                                <option value='1'>Show on Home Page</value>
                                                <option value='0'>Not Show on Home Page</value>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>

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
        $("#addhpmessage").validate({
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
