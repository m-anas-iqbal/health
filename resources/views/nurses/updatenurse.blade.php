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
                        <h4>Update Nurse</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.nurse') }}">All Nurses</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Nurse</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Nurse Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="updateNurse" action="{{ route('admin.nurseupdate' , $nurses->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nurse Name</label>
                                            <input type="text" name="nurse_name" value="{{ $nurses->nurse_name }}"
                                                id="nurse_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="nurse_gender" id="nurse_gender">
                                                <option disabled selected value="">Gender</option>
                                                <option value="Male" {{ $nurses->nurse_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $nurses->nurse_gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="nurse_address" value="{{ $nurses->nurse_address }}"
                                                id="nurse_address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="number" name="nurse_phone" value="{{ $nurses->nurse_phone }}"
                                                id="nurse_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Hospital</label>
                                            <select class="form-control" name="nurse_hospitalID" id="nurse_hospitalID" required>
                                                <option disabled selected value=""> Select Hospital</option>
                                                @if (!empty($hospitals))
                                                    @foreach ($hospitals as $hospital)
                                                        <option value="{{ $hospital->id }}" {{ $hospital->id == $nurses->nurse_hospitalID ? 'selected':''; }}> {{ $hospital->hospital_name }}</option>
                                                    @endforeach
                                                @endif
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
        $("#addNurse").validate({
            rules: {
                nurse_name: {
                    required: true,
                },
                nurse_address: {
                    required: true,
                },
                nurse_phone: {
                    required: true,
                },
                nurse_hospitalID: {
                    required: true,
                },
            },
            messages: {
                nurse_name: '<span class="text-danger ">Name is Required</span>',
                nurse_address: '<span class="text-danger ">Address is Required</span>',
                nurse_phone: '<span class="text-danger ">Phone is Required</span>',
                nurse_hospitalID: '<span class="text-danger ">Hosptial is Required</span>',
            }
        });
    </script>
@endsection
