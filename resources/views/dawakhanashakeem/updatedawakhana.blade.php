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
                        <h4>Update Dawakhanahakeem</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.dawakhanahakeem') }}">All Dawakhanahakeem</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Dawakhanahakeem</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Dawakhanahakeem Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="updateDawakhanahakeem" action="{{ route('admin.dawakhanahakeemupdate' , $dawakhanas->id) }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Dawakhanahakeem Name</label>
                                            <input type="text" name="dawakhana_name"
                                                value="{{ $dawakhanas->dawakhana_name }}" id="dawakhana_name"
                                                class="form-control">
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
        $("#updateDawakhanahakeem").validate({
            rules: {
                dawakhana_name: {
                    required: true,
                },
            },
            messages: {
                dawakhana_name: '<span class="text-danger ">Dawakhana Name is Required</span>'
            }
        });
    </script>
@endsection
