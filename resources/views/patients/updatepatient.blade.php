@extends('layout.master')
@section('doctors')
    active
@endsection
@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Patient</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.patient') }}">All Patients</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Patient</a></li>
                    </ol>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Patient Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addpatient" action="{{ route('admin.patientupdate' , $patients->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="patient_fullname"
                                                value="{{ $patients->patient_fullname }}" id="patient_fullname"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" value="{{ $patients->email }}"
                                                name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" value="{{ $patients->patient_address }}"
                                                name="patient_address" id="patient_address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="number" value="{{ $patients->patient_phone }}"
                                                name="patient_phone" id="patient_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" value="{{ $patients->patient_dob }}" name="patient_dob"
                                                id="patient_dob" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="patient_gender">
                                                <option disabled selected value="">Gender</option>
                                                <option value="Male"
                                                    {{ $patients->patient_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female"
                                                    {{ $patients->patient_gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Marital Status</label>
                                            <select class="form-control" name="patient_martialStatus">
                                                <option disabled selected value="">Marital Status</option>
                                                <option value="Single"
                                                    {{ $patients->patient_martialStatus == 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ $patients->patient_martialStatus == 'Married' ? 'selected' : '' }}>
                                                    Married </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" name="patient_bloodGroup"
                                                value="{{ $patients->patient_bloodGroup }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <input type="text" value="{{ $patients->patient_country }}"
                                                name="patient_country" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" value="{{ $patients->patient_city }}" name="patient_city"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <input type="text" value="{{ $patients->patient_state }}"
                                                name="patient_state" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Inherited Desease</label>
                                            <input type="text" name="patient_InheritedDesease" value="{{ $patients->patient_InheritedDesease }}" placeholder="Inherited Desease" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Weight</label>
                                        <div class=" input-group mb-3">
                                            <input type="number" value="{{ $patients->patient_weight }}" name="patient_weight" placeholder="Weight"
                                            class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Kg</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Height Feet</label>
                                        <div class=" input-group mb-3">
                                            <input type="number" class="form-control"
                                                value="{{ $patients->patient_height_Feet }}" name="patient_height_Feet"
                                                placeholder="Height">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Feet</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Height Inches</label>
                                        <div class=" input-group mb-3">
                                            <input type="number" class="form-control"
                                                value="{{ $patients->patient_height_Inches }}"
                                                name="patient_height_Inches" placeholder="Height">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Inches</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Profile Image</label>
                                            <input type="file" name="patient_profileImage" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label ">Patient Status</label>
                                            <select class="form-control select" name="patient_status">
                                                {{-- <option disabled selected value=""> Select Patient Status</option> --}}
                                                <option value="Active" @if($patients->patient_status && $patients->patient_status == 'Active') {{' selected'}} @endif>Active</option>
                                                <option value="Inactive" @if($patients->patient_status && $patients->patient_status == 'Inactive') {{' selected'}} @endif>Inactive</option>
                                                <option value="Block" @if($patients->patient_status && $patients->patient_status == 'Block') {{' selected'}} @endif>Block</option>
                                                <option value="Pending" @if($patients->patient_status && $patients->patient_status == 'Pending') {{' selected'}} @endif>Pending</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="patient_password" id="password" class="form-control">
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
        $("#addpatient").validate({
            rules: {
                patient_fullname: {
                    required: true,
                },

                email: {
                    required: true,
                },
                patient_password: {
                    required: false,
                },
                patient_phone: {
                    required: true,
                },
                patient_address: {
                    required: true,
                },
                patient_status: {
                    required: true,
                }
            },
            messages: {
                patient_fullname: '<span class="text-danger ">Full Name is Required</span>',
                email: '<span class="text-danger ">Email is Required</span>',
                patient_password: '<span class="text-danger ">Password is Required</span>',
                patient_phone: '<span class="text-danger ">Phone is Required</span>',
                patient_address: '<span class="text-danger ">Address is Required</span>',
                patient_status: '<span class="text-danger ">Patient Status is Required</span>',
            }
        });
    </script>
@endsection
