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
                        <h4>View hpgallery</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hpgallery') }}">All hpgallery</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">View hpgallery</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Home Page Slier Info</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"></label>
                                        <h4>Name : <strong> {{ $slider->name }}</strong> </h4>
                                    </div>
                                </div>
                            </div>    

                           
                                @for($i=1;$i<=10;$i++)
                                <?php 
                                    $imagename = 'image'.$i; 
                                    if(strlen($slider->$imagename) > 0 ){
                                ?>
                                <div class="card-header">
                                    <h5 class="card-title"><b>Slide {{$i}}</b></h5>
                                </div>
                                <div class="card-body" style='border:1px solid lightgray;margin-bottom:10px;border-radius:20px;'>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Image {{$i}}</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            @if(strlen($slider->image.$i) > 0)
                                                <?php 
                                                        switch($i){
                                                            case 1 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image1);}break;
                                                            case 2 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image2);}break;
                                                            case 3 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image3);}break;
                                                            case 4 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image4);}break;
                                                            case 5 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image5);}break;
                                                            case 6 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image6);}break;
                                                            case 7 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image7);}break;
                                                            case 8 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image8);}break;
                                                            case 9 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image9);}break;
                                                            case 10 : {$url = url('public/uploads/hpgalleryImages/'.$slider->image10);}break;
                                                        }
                                                ?>
                                                <img src="{{$url}}" width=300 height=100/>
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
                                            <p>{{$headinga}}</p>
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
                                            <p>{{$headingb}}</p>
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
                                            <p>{{$link}}</p>
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
                                            <p>{{$detail}}</p>
                                        </div>
                                    </div>
                                </div>


                                </div> 
                                <?php } ?>
                                @endfor
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <h4>Status</h4>
                                        <p>{{ $slider->status }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <h4>Show on Home Page</h4>
                                        <p>{{ $slider->show_on_hp }}</p>
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
    
@endsection
