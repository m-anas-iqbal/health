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
                        <h4>Update hpmainslider</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hpmainslider') }}">All hpmainslider</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update hpmainslider</a></li>
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
                            <form id="addblog" action="{{ route('admin.hpmainsliderupdate', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" id="name" value="{{ $slider->name }}" class="form-control">
                                        </div>
                                    </div>
                                </div>    
                               
                                @for($i=1;$i<=10;$i++)
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
                                            @if(strlen($slider->image.$i) > 0)
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image1);}break;
                                                            case 2 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image2);}break;
                                                            case 3 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image3);}break;
                                                            case 4 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image4);}break;
                                                            case 5 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image5);}break;
                                                            case 6 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image6);}break;
                                                            case 7 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image7);}break;
                                                            case 8 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image8);}break;
                                                            case 9 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image9);}break;
                                                            case 10 : {$url = url('public/uploads/HpMainSliderImages/'.$slider->image10);}break;
                                                        }
                                                ?>
                                                <img src="{{$url}}" id="img_{{$i}}" style="width:100%;" height=100 /><span class='del_img' id='{{$i}}' style='color:red;cursor:pointer;'>Delete</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                        @if(strlen($slider->heading.$i.'a') > 0)
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$headinga = $slider->heading1a;}break;
                                                            case 2 : {$headinga = $slider->heading2a;}break;
                                                            case 3 : {$headinga = $slider->heading3a;}break;
                                                            case 4 : {$headinga = $slider->heading4a;}break;
                                                            case 5 : {$headinga = $slider->heading5a;}break;
                                                            case 6 : {$headinga = $slider->heading6a;}break;
                                                            case 7 : {$headinga = $slider->heading7a;}break;
                                                            case 8 : {$headinga = $slider->heading8a;}break;
                                                            case 9 : {$headinga = $slider->heading9a;}break;
                                                            case 10 : {$headinga = $slider->heading10a;}break;
                                                        }
                                                ?>
                                            @endif
                                            <label class="form-label">Heading {{$i}} A</label>
                                            <input type="text" name="heading{{$i}}a" id="heading{{$i}}a" value="{{$headinga}}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                        @if(strlen($slider->heading.$i.'b') > 0)
                                                <?php 
                                                    switch($i){
                                                        case 1 : {$headingb = $slider->heading1b;}break;
                                                        case 2 : {$headingb = $slider->heading2b;}break;
                                                        case 3 : {$headingb = $slider->heading3b;}break;
                                                        case 4 : {$headingb = $slider->heading4b;}break;
                                                        case 5 : {$headingb = $slider->heading5b;}break;
                                                        case 6 : {$headingb = $slider->heading6b;}break;
                                                        case 7 : {$headingb = $slider->heading7b;}break;
                                                        case 8 : {$headingb = $slider->heading8b;}break;
                                                        case 9 : {$headingb = $slider->heading9b;}break;
                                                        case 10 : {$headingb = $slider->heading10b;}break;
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
                                                            case 1 : {$link = $slider->link1;}break;
                                                            case 2 : {$link = $slider->link2;}break;
                                                            case 3 : {$link = $slider->link3;}break;
                                                            case 4 : {$link = $slider->link4;}break;
                                                            case 5 : {$link = $slider->link5;}break;
                                                            case 6 : {$link = $slider->link6;}break;
                                                            case 7 : {$link = $slider->link7;}break;
                                                            case 8 : {$link = $slider->link8;}break;
                                                            case 9 : {$link = $slider->link9;}break;
                                                            case 10 : {$link = $slider->link10;}break;
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
                                                        case 1 : {$detail = $slider->detail1;}break;
                                                        case 2 : {$detail = $slider->detail2;}break;
                                                        case 3 : {$detail = $slider->detail3;}break;
                                                        case 4 : {$detail = $slider->detail4;}break;
                                                        case 5 : {$detail = $slider->detail5;}break;
                                                        case 6 : {$detail = $slider->detail6;}break;
                                                        case 7 : {$detail = $slider->detail7;}break;
                                                        case 8 : {$detail = $slider->detail8;}break;
                                                        case 9 : {$detail = $slider->detail9;}break;
                                                        case 10 : {$detail = $slider->detail10;}break;
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
                                                <option value='1' <?php if($slider->status == '1') echo ' selected'; ?>>Active</value>
                                                <option value='0' <?php if($slider->status == '0') echo ' selected'; ?>>Disabled</value>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Show on Home Page</label>
                                            <select name="show_on_hp" class="form-control">
                                                <option value='1' <?php if($slider->show_on_hp == '1') echo ' selected'; ?>>Showed on Home Page</value>
                                                <option value='0' <?php if($slider->show_on_hp == '0') echo ' selected'; ?>>Not Show on Home Page</value>
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
        var hpmainsliderimage = "{{ $slider->image }}";
        var himage_status = false;
        if(hpmainsliderimage == '') himage_status = true;
        //alert(himage_status);
        $("#addhpmainslider").validate({
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
    <script>
        //$(document).ready(function(){
            //alert('js ready');
        //});
        $(document).on('click', '.del_img', function(){
            var slider_id = parseInt("{{$slider->id}}");
            var id = parseInt($(this).attr('id'));
            //console.log(slider_id+' == ' + id);
            var c = confirm('Sure! You want to delete this image');
            if(c){
                    $.ajax({
                        type:'post',
                        url:"{{url('admin/hpmainslider/delimg')}}",
                        data:{'_token': "{{ csrf_token() }}",'id':id, 'slider_id':slider_id},
                        dataType:'json',
                        success:function(data){
                            console.log('success');    
                            console.log(data);
                            if(data == true){
                              $('#img_'+id).attr('src','');      
                            }
                        },
                        error:function(data){
                            console.log('error');    
                            console.log(data.responseText);
                        }
                    });
            }
        });
    </script>
@endsection
