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
                        <h4>Update services</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hpservice') }}">All Services</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Service</a></li>
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
                            <form id="addhpservice" action="{{ route('admin.hpserviceupdate', $hpservices->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Main Heading</label>
                                            <input type="text" name="main_heading" id="main_heading" value="{{ $hpservices->mainheading }}" class="form-control">
                                        </div>
                                    </div>

                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="12" name="description"
                                                style="resize: none">{{ $hpservices->description }}</textarea>
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 1</label>
                                            <input type="text" name="icon_1" id="icon_1" class="form-control"value="{{ $hpservices->icon1 }}">
                                            

                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 1</label>
                                            <input type="text" name="slug_1" id="slug_1" class="form-control"value="{{ $hpservices->slug1 }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading 1</label>
                                            <input type="text" name="heading_1" id="heading_1" value="{{ $hpservices->heading1 }}" class="form-control">
                                        </div>
                                    </div>

                                   
                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 1</label>
                                            <textarea class="form-control" rows="12" name="description_1"
                                                style="resize: none">{{ $hpservices->description1 }}</textarea>
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 2</label>
                                            <input type="text" name="icon_2" id="icon_2" class="form-control" value="{{ $hpservices->icon2 }}">
                                            

                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 2</label>
                                            <input type="text" name="slug_2" id="slug_2" class="form-control"value="{{ $hpservices->slug2 }}">
                                        </div>
                                    </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading 2</label>
                                            <input type="text" name="heading_2" id="heading_2" value="{{ $hpservices->heading2 }}" class="form-control">
                                        </div>
                                    </div>

                                  
                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 2</label>
                                            <textarea class="form-control" rows="12" name="description_2"
                                                style="resize: none">{{ $hpservices->description2 }}</textarea>
                                        </div>
                                    </div>


                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 3</label>
                                            <input type="text" name="icon_3" id="icon_3" class="form-control"value="{{ $hpservices->icon3 }}">
                                            

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 3</label>
                                            <input type="text" name="slug_3" id="slug_3" class="form-control"value="{{ $hpservices->slug3 }}">
                                        </div>
                                    </div>


                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading3</label>
                                            <input type="text" name="heading_3" id="heading_3" value="{{ $hpservices->heading3 }}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 3</label>
                                            <textarea class="form-control" rows="12" name="description_3"
                                                style="resize: none">{{ $hpservices->description3 }}</textarea>
                                        </div>
                                    </div>

                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 4</label>
                                            <input type="text" name="icon_4" id="icon_4" class="form-control" value="{{ $hpservices->icon4 }}">
                                            

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 4</label>
                                            <input type="text" name="slug_4" id="slug_4" class="form-control"value="{{ $hpservices->slug4 }}">
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading 4</label>
                                            <input type="text" name="heading_4" id="heading_4" value="{{ $hpservices->heading4 }}" class="form-control">
                                        </div>
                                    </div>

                                  

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 4</label>
                                            <textarea class="form-control" rows="12" name="description_4"
                                                style="resize: none">{{ $hpservices->description4 }}</textarea>
                                        </div>
                                    </div>


                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 5</label>
                                            <input type="text" name="icon_5" id="icon_5" class="form-control" value="{{ $hpservices->icon5 }}">
                                            

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 5</label>
                                            <input type="text" name="slug_5" id="slug_5" class="form-control"value="{{ $hpservices->slug5 }}">
                                        </div>
                                    </div>




                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading 5</label>
                                            <input type="text" name="heading_5" id="heading_5" value="{{ $hpservices->heading5 }}" class="form-control">
                                        </div>
                                    </div>

                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 5</label>
                                            <textarea class="form-control" rows="12" name="description_5"
                                                style="resize: none">{{ $hpservices->description5 }}</textarea>
                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Icon 6</label>
                                            <input type="text" name="icon_6" id="icon_6" class="form-control" value="{{ $hpservices->icon6 }}">
                                            

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Slug 6</label>
                                            <input type="text" name="slug_6" id="slug_6" class="form-control"value="{{ $hpservices->slug6 }}">
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Heading 6</label>
                                            <input type="text" name="heading_6" id="heading_6" value="{{ $hpservices->heading6 }}" class="form-control">
                                        </div>
                                    </div>

                                      

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description 6</label>
                                            <textarea class="form-control" rows="12" name="description_6"
                                                style="resize: none">{{ $hpservices->description6 }}</textarea>
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
        var messageimage1 = "{{ $hpservices->Image1 }}";
        var messagemage_status1 = false;
        if(messageimage1 == '') messagemage_status1 = true;
        //alert(bimage_status);
        $("#addhpmessage").validate({
            rules: {
                : {
                    required: true,
                },
                description: {
                    required: true,
                },
                image1: {
                    required:messagemage_status1,
                }    
            },
            messages: {
                title: '<span class="text-danger ">Title is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
                image1:'<span class="text-danger">Blog image is required.</span>',
            }
        });
    </script>
@endsection
