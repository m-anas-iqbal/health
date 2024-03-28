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
                        <h4>Add hpgallery</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.gallery') }}">All hpgallery</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add hpgallery</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Home Page Main Slider Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addhpgallery" action="{{ route('admin.hpgallerystore') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Title Name</label>
                                            <input type="text" name="name" id="title" class="form-control">
                                        </div>
                                    </div>
                                </div>    
                                @for($i=1;$i<=10;$i++)   
                                <div class="card-header">
                                    <h5 class="card-title"><b>Slide {{$i}}</b></h5>
                                </div>
                                <div class="card-body" style='border:1px solid lightgray;margin-bottom:10px;border-radius:20px;'>                 
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Image {{$i}}</label>
                                            <input type="file" name="image{{$i}}" id="image{{$i}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Heading {{$i}} A</label>
                                            <input type="text" name="heading{{$i}}a" id="heading{{$i}}a" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Heading {{$i}} B</label>
                                            <input type="text" name="heading{{$i}}b" id="heading{{$i}}b" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Link {{$i}}</label>
                                            <input type="text" name="link{{$i}}" id="link{{$i}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description {{$i}}</label>
                                            <textarea class="form-control" rows="3" name="detail{{$i}}" style="resize: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endfor
                                    
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
        $("#addhpgallery").validate({
            rules: {
                name: {
                    required: true,
                },
                details: {
                    required: true,
                },

            },
            messages: {
                name: '<span class="text-danger ">Name is Required</span>',
                details: '<span class="text-danger ">Details is Required</span>',
            }
        });
    </script>
@endsection
