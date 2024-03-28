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
                        <h4>Update Doctor </h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    <ol class="breadcrumb">
                        @if (Auth::guard()->user()->role == 12)
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('doctor') }}">All Doctors</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Doctor</a></li>
                        @endif
                    </ol>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Doctor Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addDoctor" action="{{ url('doctor/update/' . $doctors->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="doctor_fullname"
                                                value="{{ $doctors->doctor_fullname }}" id="doctor_fullname"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ $doctors->email }}"
                                                id="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="number" name="doctor_phone" value="{{ $doctors->doctor_phone }}"
                                                id="doctor_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="doctor_dob" value="{{ $doctors->doctor_dob }}"
                                                id="doctor_dob" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="doctor_gender">
                                                <option disabled selected value="">Gender</option>
                                                <option value="Male"
                                                    {{ $doctors->doctor_gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female"
                                                    {{ $doctors->doctor_gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> Marital Status</label>
                                            <select class="form-control" name="doctor_martialStatus">
                                                <option disabled selected value="">Marital Status</option>
                                                <option value="Single"
                                                    {{ $doctors->doctor_martialStatus == 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ $doctors->doctor_martialStatus == 'Married' ? 'selected' : '' }}>
                                                    Married </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="doctor_country"
                                                value="{{ $doctors->doctor_country }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" name="doctor_city" value="{{ $doctors->doctor_city }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <input type="text" name="doctor_state" value="{{ $doctors->doctor_state }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Degree</label>
                                            <input type="text" name="doctor_degree" value="{{ $doctors->doctor_degree }}"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Experience</label>
                                            <input type="text" name="doctor_experience"
                                                value="{{ $doctors->doctor_experience }}" class="form-control">
                                        </div>
                                    </div>





                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Speciality</label>
                                            <select class="form-control select multipleSelection"
                                                name="doctor_specialty_id[]" multiple>
                                                @if (!empty($specialties))
                                                    @foreach ($specialties as $specialtie)
                                                        <option value="{{ $specialtie->id }}"
                                                            @if (in_array($specialtie->id, $doctorspecialties)) selected @endif>
                                                            {{ $specialtie->specialty_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Hospital</label>
                                            <select class="form-control select multipleSelection"
                                                name="doctor_hospital_id[]" multiple>
                                                {{-- <option disabled selected value=""> Select Hospital</option> --}}
                                                @if (!empty($hospitals))
                                                    @foreach ($hospitals as $hospital)
                                                        <option value="{{ $hospital->id }}" 
                                                            @if (in_array($hospital->id, $doctorhospital)) selected @endif>
                                                            {{ $hospital->hospital_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label ">Course</label>
                                            <select class="form-control select multipleSelection" name="doctor_course_id[]"
                                                multiple>
                                                {{-- <option disabled selected value=""> Select Course</option> --}}
                                                @if (!empty($courseforms))
                                                    @foreach ($courseforms as $courseform)
                                                        <option value="{{ $courseform->id }}"
                                                            @if (in_array($courseform->id, $doctorcourseForm)) selected @endif>
                                                            {{ $courseform->course_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Doctor Type</label>
                                            <select class="form-control" name="doctor_doctorType_id">
                                                <option disabled selected value=""> Select Doctor Type</option>
                                                @if (!empty($doctorTypes))
                                                    @foreach ($doctorTypes as $doctorType)
                                                        <option value="{{ $doctorType->id }}"
                                                            {{ $doctorType->id == $doctors->doctor_doctorType_id ? 'selected' : '' }}>
                                                            {{ $doctorType->doctorType_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">PMDC</label>
                                            <input type="file" name="doctor_PMDC" class="form-control">
                                        </div>

                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="doctor_password" value="{{ $doctors->doctor_password }}"  id="doctor_password"
                                                class="form-control">
                                        </div>
                                    </div> --}}

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
        $("#addDoctor").validate({
            rules: {
                doctor_fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                doctor_password: {
                    required: true,
                },
                doctor_phone: {
                    required: true,
                },
                doctor_address: {
                    required: true,
                },
            },
            messages: {
                doctor_fullname: '<span class="text-danger ">Full Name is Required</span>',
                email: '<span class="text-danger ">Email is Required</span>',
                password: '<span class="text-danger ">Password is Required</span>',
                doctor_phone: '<span class="text-danger ">Phone is Required</span>',
                doctor_address: '<span class="text-danger ">Address is Required</span>',
            }
        });
    </script>
@endsection
