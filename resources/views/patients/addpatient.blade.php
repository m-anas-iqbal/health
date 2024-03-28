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
                        <h4>Add Patient</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.patient') }}">All Patients</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Patient</a></li>
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
                            <form id="addpatient" action="{{ route('admin.patientstore') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label> <span id='patient_fullname'></span>
                                            <input type="text" name="patient_fullname" placeholder="Full Name" id="patient_fullname"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label> <span id='email'></span>
                                            <input type="email" name="email" placeholder="Email" id="email"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label> <span id='patient_address'></span>
                                            <input type="text" name="patient_address" placeholder="Address" id="patient_address"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label> <span id='patient_phone'></span>
                                            <input type="number" name="patient_phone" placeholder="Phone" id="patient_phone"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label> <span id='patient_dob'></span>
                                            <input type="date" name="patient_dob"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label> <span id='patient_gender'></span>
                                            <select class="form-control" name="patient_gender" id="patient_gender">
                                                <option disabled selected value="">Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Marital Status</label> <span id='patient_martialStatus'></span>
                                            <select class="form-control" name="patient_martialStatus">
                                                <option disabled selected value="">Marital Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Blood Group</label> <span id='patient_bloodGroup'></span>
                                            <input type="text" placeholder="Blood Group" name="patient_bloodGroup" 
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Country</label> <span id='patient_country'></span>
                                            <input type="text" name="patient_country" placeholder="Country" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label> <span id='patient_city'></span>
                                            <input type="text" name="patient_city" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">State</label> <span id='patient_state'></span>
                                            <input type="text" name="patient_state" placeholder="State" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Inherited Desease</label> <span id='patient_InheritedDesease'></span>
                                            <input type="text" name="patient_InheritedDesease" placeholder="Inherited Desease" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Password</label> <span id='patient_password'></span>
                                            <input type="password" name="patient_password" placeholder="Password" id="patient_password"
                                                class="form-control">
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class=" input-group mb-3">
                                            
                                            <input type="number" name="patient_weight" placeholder="Weight"
                                            class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Kg</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class=" input-group mb-3">
                                            <input type="number" class="form-control" name="patient_height_Feet"
                                                placeholder="Height In Feet">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Feet</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class=" input-group mb-3">
                                            <input type="number" class="form-control" name="patient_height_Inches"
                                                placeholder="Height In Inches">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Inches</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Profile Image</label> <span id='patient_profileImage'></span>
                                            <input type="file" name="patient_profileImage" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Patient Status</label> <span id='patient_status'></span>
                                            <select class="form-control" name="patient_status">
                                                <option disabled selected value=""> Select Patient Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                                <option value="Block">Block</option>
                                                <option value="Pending">Pending</option>
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
        $("#addpatient").validate({
            rules: {
                patient_fullname: {
                    required: true,
                },
               
                email: {
                    required: true,
                },
                patient_password: {
                    required: true,
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
            errorPlacement: function (error, element) {
                if (element.attr("name") == "patient_fullname") {
                    error.appendTo("#patient_fullname");
                }
                if (element.attr("name") == "email") {
                    error.appendTo("#email");
                }
                if (element.attr("name") == "patient_password") {
                    error.appendTo("#patient_password");
                }
                if (element.attr("name") == "patient_phone") {
                    error.appendTo("#patient_phone");
                }
                if (element.attr("name") == "patient_address") {
                    error.appendTo("#patient_address");
                }
                if (element.attr("name") == "patient_status") {
                    error.appendTo("#patient_status");
                }

                
            },
            messages: {
                patient_fullname: '[<span class="text-danger ">Full Name is Required</span>]',
                email: '[<span class="text-danger ">Email is Required</span>]',
                patient_password: '[<span class="text-danger ">Password is Required</span>]',
                patient_phone: '[<span class="text-danger ">Phone is Required</span>]',
                patient_address: '[<span class="text-danger ">Address is Required</span>]',
                patient_status: '[<span class="text-danger ">Patient Status is Required</span>]',
            }
        });
    </script>
@endsection
