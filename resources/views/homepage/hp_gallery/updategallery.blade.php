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
                        <h4>Update hpgallery</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.gallery') }}">All hpgallery</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update hpgallery</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Home Page Gallery</h5>
                        </div>
                        <div class="card-body">
                            <form id="addblog" action="{{ route('admin.hpgalleryupdate', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" id="name" value="{{ $gallery->name }}" class="form-control">
                                        </div>
                                    </div>
                                </div>    
                               
                                @for($i=1;$i<=12;$i++)
                                <div class="card-header">
                                    <h5 class="card-title"><b>Slide {{$i}}</b></h5>
                                </div>
                                <div class="card-body" style='border:1px solid lightgray;margin-bottom:10px;border-radius:20px;'>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Image {{$i}}</label>
                                            <input type="file" name="image{{$i}}" id="image{{$i}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            @if(strlen($gallery->image.$i) > 0)
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image1);}break;
                                                            case 2 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image2);}break;
                                                            case 3 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image3);}break;
                                                            case 4 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image4);}break;
                                                            case 5 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image5);}break;
                                                            case 6 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image6);}break;
                                                            case 7 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image7);}break;
                                                            case 8 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image8);}break;
                                                            case 9 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image9);}break;
                                                            case 10 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image10);}break;
                                                            case 11 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image11);}break;
                                                            case 12 : {$url = url('public/uploads/HpGalleriesImages/'.$gallery->image12);}break;
                                                        }
                                                ?>
                                                <img src="{{$url}}" style="width:100%;" height=100 />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                        @if(strlen($gallery->heading.$i.'a') > 0)
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$headinga = $gallery->heading1a;}break;
                                                            case 2 : {$headinga = $gallery->heading2a;}break;
                                                            case 3 : {$headinga = $gallery->heading3a;}break;
                                                            case 4 : {$headinga = $gallery->heading4a;}break;
                                                            case 5 : {$headinga = $gallery->heading5a;}break;
                                                            case 6 : {$headinga = $gallery->heading6a;}break;
                                                            case 7 : {$headinga = $gallery->heading7a;}break;
                                                            case 8 : {$headinga = $gallery->heading8a;}break;
                                                            case 9 : {$headinga = $gallery->heading9a;}break;
                                                            case 10 : {$headinga = $gallery->heading10a;}break;
                                                            case 11 : {$headinga = $gallery->heading11a;}break;
                                                            case 12 : {$headinga = $gallery->heading12a;}break;
                                                        }
                                                ?>
                                            @endif
                                            <label class="form-label">Heading {{$i}} A</label>
                                            <input type="text" name="heading{{$i}}a" id="heading{{$i}}a" value="{{$headinga}}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                        @if(strlen($gallery->heading.$i.'b') > 0)
                                                <?php 
                                                    switch($i){
                                                        case 1 : {$headingb = $gallery->heading1b;}break;
                                                        case 2 : {$headingb = $gallery->heading2b;}break;
                                                        case 3 : {$headingb = $gallery->heading3b;}break;
                                                        case 4 : {$headingb = $gallery->heading4b;}break;
                                                        case 5 : {$headingb = $gallery->heading5b;}break;
                                                        case 6 : {$headingb = $gallery->heading6b;}break;
                                                        case 7 : {$headingb = $gallery->heading7b;}break;
                                                        case 8 : {$headingb = $gallery->heading8b;}break;
                                                        case 9 : {$headingb = $gallery->heading9b;}break;
                                                        case 10 : {$headingb = $gallery->heading10b;}break;
                                                        case 11 : {$headingb = $gallery->heading11b;}break;
                                                        case 12 : {$headingb = $gallery->heading12b;}break;
                                                    }
                                                ?>
                                            @endif
                                            <label class="form-label">Heading {{$i}} B</label>
                                            <input type="text" name="heading{{$i}}b" id="heading{{$i}}b" value="{{$headingb}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$link = $gallery->link1;}break;
                                                            case 2 : {$link = $gallery->link2;}break;
                                                            case 3 : {$link = $gallery->link3;}break;
                                                            case 4 : {$link = $gallery->link4;}break;
                                                            case 5 : {$link = $gallery->link5;}break;
                                                            case 6 : {$link = $gallery->link6;}break;
                                                            case 7 : {$link = $gallery->link7;}break;
                                                            case 8 : {$link = $gallery->link8;}break;
                                                            case 9 : {$link = $gallery->link9;}break;
                                                            case 10 : {$link = $gallery->link10;}break;
                                                            case 11 : {$link = $gallery->link11;}break;
                                                            case 12 : {$link = $gallery->link12;}break;
                                                        }
                                                ?>
                                            <label class="form-label">Link {{$i}} </label>
                                            <input type="text" name="link{{$i}}" id="{{$link}}" value="{{$link}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <?php 
                                                    switch($i){
                                                        case 1 : {$detail = $gallery->detail1;}break;
                                                        case 2 : {$detail = $gallery->detail2;}break;
                                                        case 3 : {$detail = $gallery->detail3;}break;
                                                        case 4 : {$detail = $gallery->detail4;}break;
                                                        case 5 : {$detail = $gallery->detail5;}break;
                                                        case 6 : {$detail = $gallery->detail6;}break;
                                                        case 7 : {$detail = $gallery->detail7;}break;
                                                        case 8 : {$detail = $gallery->detail8;}break;
                                                        case 9 : {$detail = $gallery->detail9;}break;
                                                        case 10 : {$detail = $gallery->detail10;}break;
                                                        case 11 : {$detail = $gallery->detail11;}break;
                                                        case 12 : {$detail = $gallery->detail12;}break;
                                                    }
                                            ?>
                                            <label class="form-label">Description {{$i}}</label>
                                            <textarea class="form-control" rows="3" name="detail{{$i}}" style="resize: none">{{$detail}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endfor

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value='1' <?php if($gallery->status == '1') echo ' selected'; ?>>Active</value>
                                                <option value='0' <?php if($gallery->status == '0') echo ' selected'; ?>>Disabled</value>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Show on Home Page</label>
                                            <select name="show_on_hp" class="form-control">
                                                <option value='1' <?php if($gallery->show_on_hp == '1') echo ' selected'; ?>>Showed on Home Page</value>
                                                <option value='0' <?php if($gallery->show_on_hp == '0') echo ' selected'; ?>>Not Show on Home Page</value>
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
        var hpgalleryimage = "{{ $gallery->image }}";
        var himage_status = false;
        if(hpgalleryimage == '') himage_status = true;
        //alert(himage_status);
        $("#addhpgallery").validate({
            rules: {
                name: {
                    required: true,
                },
                details: {
                    required: true,
                },
                image: {
                    required:himage_status,
                }    
            },
            messages: {
                name: '<span class="text-danger ">Name is Required</span>',
                details: '<span class="text-danger ">Details is Required</span>',
                image:'<span class="text-danger">Blog image is required.</span>',
            }
        });
    </script>
@endsection
