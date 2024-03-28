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
                        <h4>Update Navbar</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.navbar') }}">All Navbars</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Navbar</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Navbar Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addnavbar" action="{{ route('admin.navbarupdate', $navbars->id) }}" method="POST" >
                                {{ csrf_field() }}
                                <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Parent Name</label>
                                            <select name="parent" id="parent" class="form-control">
                                                <option value='0'>Please Select Parent</option>
                                                <?php 
                                                $nav_parentsExist = DB::table('navbars')->where('parent', 0)->get();
                                                if($nav_parentsExist->count() > 0){
                                                    foreach($nav_parentsExist as $navbar){
                                                ?>            
                                                    <option value='{{$navbar->id}}' @if($navbars && $navbars->parent == $navbar->id) {{'selected'}} @endif>{{$navbar->title}}</option>
                                                <?php 
                                                    }
                                                }
                                                ?>            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Title Name</label>
                                            <input type="text" name="title" id="title" value="{{ $navbars->title }}" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="12" name="description"
                                                style="resize: none">{{ $navbars->description }}</textarea>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Sort</label>
                                            <input type="text" name="sort" id="sort" value="{{ $navbars->sort }}" class="form-control">  
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="A" {{ $navbars->status=='A'?'selected':''}}>A</option>
                                                <option value="D" {{ $navbars->status=='D'?'selected':''}}>D</option>


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
       
     
        //alert(bimage_status);
        $("#addnavbar").validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                }  
            },
            messages: {
                title: '<span class="text-danger ">Title is Required</span>',
                description: '<span class="text-danger ">Description is Required</span>',
               
            }
        });
    </script>
@endsection
