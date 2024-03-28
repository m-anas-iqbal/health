@extends('layout.master')
@section('dawakhana')
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
                        <h4>Update Profile </h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">


                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Profile Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="adddawakhanaProfile"
                                action="{{ url('dawakhanaProfile/update/' . $dawakhanas->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="name" value="{{ $dawakhanas->name }}" id="name"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="number" name="phone" value="{{ $dawakhanas->phone }}" id="phone"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" value="{{ $dawakhanas->dob }}" id="dob"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option disabled selected value="">Gender</option>
                                                <option value="Male"
                                                    {{ $dawakhanas->gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female"
                                                    {{ $dawakhanas->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" value="{{ $dawakhanas->address }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="country" value="{{ $dawakhanas->country }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" value="{{ $dawakhanas->city }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" value="{{ $dawakhanas->state }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Profile Image</label>
                                            <input type="file" name="profileImage" class="form-control">
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
        $("#adddawakhanaProfile").validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {
                name: '<span class="text-danger ">Full Name is Required</span>',
                phone: '<span class="text-danger ">Phone is Required</span>',
                address: '<span class="text-danger ">Address is Required</span>',
            }
        });
    </script>
@endsection
