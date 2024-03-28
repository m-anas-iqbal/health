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
                        <h4>Edit Appointment</h4>


                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.appointment') }}">All Appointments</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Appointment</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    @if (Session::has('message'))
                        <div class="alert alert-danger">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Appointment Info</h5>
                        </div>
                        <div class="card-body">
                            <form id="addAppointment" action="{{ route('admin.appointmentstore') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Dcotor Name</label>
                                            <select class="form-control" name="appointment_doctorID">
                                                <option disabled selected value=""> Select Dcotor</option>
                                                @if (!empty($doctors))
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">
                                                            {{ $doctor->doctor_fullname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="appointment_date"
                                                class="datepicker-default form-control" id="date_picker">


                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Time</label>
                                        <div class=" input-group mb-3">
                                            <input type="time" name="appointment_timeForm" id="appointment_timeForm"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">From</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label" style="color: white">asd</label>
                                        <div class=" input-group mb-3">
                                            <input type="time" name="appointment_timeTo" id="appointment_timeTo"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">To</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <br>
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
        $("#addAppointment").validate({
            rules: {
                appointment_doctorID: {
                    required: true,
                },
                appointment_date: {
                    required: true,
                },
                appointment_timeTo: {
                    required: true,
                },
                appointment_timeForm: {
                    required: true,
                },
                appointment_doctorID: {
                    required: true,
                },
            },
            messages: {
                appointment_doctorID: '<span class="text-danger ">Doctor Name is Required</span>',
                appointment_date: '<span class="text-danger ">Date is Required</span>',
                appointment_timeTo: '<span class="text-danger ">Time To is Required</span>',
                appointment_timeForm: '<span class="text-danger ">Time From is Required</span>',
            }
        });


        var today = new Date();
        var dd = String(today.getDate()+1).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min', today);
    </script>
@endsection
