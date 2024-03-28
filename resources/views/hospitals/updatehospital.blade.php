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
                        <h4>Update Hospital</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.hospital') }}">All Hospitals</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Hospital</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Hospital Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="updateHospital" action="{{ route('admin.hospitalupdate' , $hospitals->id) }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Hospital Name</label>
                                            <input type="text" name="hospital_name"
                                                value="{{ $hospitals->hospital_name }}" id="hospital_name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="hospital_address"
                                                value="{{ $hospitals->hospital_address }}" id="hospital_address"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="phone" name="hospital_phone"
                                                value="{{ $hospitals->hospital_phone }}" id="hospital_phone"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" name="hospital_city"
                                                value="{{ $hospitals->hospital_city }}" id="hospital_city"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Zip</label>
                                            <input type="phone" name="hospital_zip" value="{{ $hospitals->hospital_zip }}"
                                                id="hospital_zip" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Province</label>
                                            <input type="text" name="hospital_province"
                                                value="{{ $hospitals->hospital_province }}" id="hospital_province"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">24/7 Emergency Services</label>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" class="checkES" id="updateEmergencyServices"
                                                        name="hospital_emergencyServices"
                                                        {{ $hospitals->hospital_emergencyServices == 0 ? 'checked' : '' }}
                                                        value="0">
                                                    No</label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="checkES"
                                                        name="hospital_emergencyServices"
                                                        {{ $hospitals->hospital_emergencyServices == 1 ? 'checked' : '' }}
                                                        value="1">
                                                    yes</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12" id="hospitalEmergencyServices">
                                        <div class="form-group">
                                          
                                                        <div class="form-check mb-2">
                                                            {{-- @if (in_array(1, $country_region)) checked="checked"
                                                            @endif> --}}

                                                             {{-- @if (in_array("1", $hospitals->hospital_em_value , true)  )
                                                             <label class="form-check-label" for="check1" >Emergency Video
                                                                Consulation</label>
                                                             @endif  --}}


                                                            <input type="checkbox" name="hospital_em_value1"
                                                                class="form-check-input" id="check1" value="1"  {{ $hospitals->hospital_em_value1 == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="check1" >Emergency Video
                                                                Consulation</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" name="hospital_em_value2"
                                                                class="form-check-input" id="check2" value="2"  {{ $hospitals->hospital_em_value2 == 2 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="check2">Instant Call
                                                                Consulation</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" name="hospital_em_value3"
                                                                class="form-check-input" id="check2" value="3"  {{ $hospitals->hospital_em_value3 == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="check2">Ambulance Help
                                                                Line</label>
                                                        </div>
                                             
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
        $("#updateHospital").validate({
            rules: {
                hospital_name: {
                    required: true,
                },
                hospital_address: {
                    required: true,
                },
                hospital_phone: {
                    required: true,
                },
                hospital_city: {
                    required: true,
                },
                hospital_zip: {
                    required: true,
                },
                hospital_province: {
                    required: true,
                },
            },
            messages: {
                hospital_name: '<span class="text-danger ">Hospital Name is Required</span>',
                hospital_address: '<span class="text-danger ">Address is Required</span>',
                hospital_phone: '<span class="text-danger ">Phone is Required</span>',
                hospital_city: '<span class="text-danger ">City is Required</span>',
                hospital_zip: '<span class="text-danger ">Zip is Required</span>',
                hospital_province: '<span class="text-danger ">Province is Required</span>',

            }
        });

        $(".checkES").on('change', function() {
            var getValue = $('input[name="hospital_emergencyServices"]:checked').val();

            if (getValue == 1) {
                $('#hospitalEmergencyServices').show();
            } else {
                $('#hospitalEmergencyServices').hide();
            }
        });

        var checkedES = document.getElementById("updateEmergencyServices").checked;
        if (checkedES == true) {
            document.getElementById("hospitalEmergencyServices").style.display = "none"
        }
    </script>
@endsection
