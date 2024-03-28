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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.appointment') }}">All Appointments</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Appointment</a></li>
                    </ol>
                </div>
            </div>
            {{-- value="{{ }} " --}}
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
                            <a href='javascript:void(0)' apmt_id="{{$id}}" id='del_apmt' class='btn btn-danger'>Delete this appoinment.</a>
                        </div>
                        <div class="card-body">
                            <form id="updateAppointment" action="{{ route('admin.appointmentupdate' , $appointments->id) }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Dcotor Name</label> <span id='appointment_doctorID'></span>
                                            <select class="form-control" name="appointment_doctorID">
                                                <option disabled selected value=""> Select Dcotor</option>
                                                @if (!empty($doctors))
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}"
                                                            {{ $doctor->id == $appointments->appointment_doctorID ? 'selected' : '' }}>
                                                            {{ $doctor->doctor_fullname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date</label> <span id='appointment_date'></span>
                                            <input type="date" name="appointment_date"
                                                value="{{ $appointments->appointment_date }}" id="date_picker"
                                                class="datepicker-default form-control">

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">From Time</label> <span id='appointment_timeForm'></span>
                                        <div class=" input-group mb-3">
                                            <input type="time" name="appointment_timeForm"
                                                value="{{ $appointments->appointment_timeForm }}" id="appointment_timeForm"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">From</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label"> To Time</label> <span id='appointment_timeTo'></span>
                                        <div class=" input-group mb-3">
                                            <input type="time" name="appointment_timeTo"
                                                value="{{ $appointments->appointment_timeTo }}" id="appointment_timeTo"
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
        $("#updateAppointment").validate({
            rules: {
                appointment_name: {
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
            errorPlacement: function (error, element) {
                
                if (element.attr("name") == "appointment_name") {
                    error.appendTo("#appointment_name");
                }
                if (element.attr("name") == "appointment_date") {
                    error.appendTo("#appointment_date");
                }
                if (element.attr("name") == "appointment_timeTo") {
                    error.appendTo("#appointment_timeTo");
                }
                if (element.attr("name") == "appointment_timeForm") {
                    error.appendTo("#appointment_timeForm");
                }
                if (element.attr("name") == "appointment_doctorID") {
                    error.appendTo("#appointment_doctorID");
                }
            },
            messages: {
                appointment_name: '[<span class="text-danger ">Name is Required</span>]',
                appointment_date: '[<span class="text-danger ">Date is Required</span>]',
                appointment_timeTo: '[<span class="text-danger ">Time To is Required</span>]',
                appointment_timeForm: '[<span class="text-danger ">Time From is Required</span>]',
                appointment_doctorID: '[<span class="text-danger ">Doctor Name is Required</span>]',
            }
        });

        
        var today = new Date();
        var dd = String(today.getDate()+1).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min', today);

        $(document).on('click','#del_apmt', function(){
            var apmt_id = $(this).attr('apmt_id');
            //alert(apmt_id);
            var c = confirm('Sure! You want to delete this appointment');
            if(c == true){
                $.ajax({
                    type:'post',
                    url:"{{url('admin/appointment/delete')}}",
                    data:{apmt_id:apmt_id, "_token": "{{ csrf_token() }}",},
                    dataType:'json',
                    success:function(data){
                        console.log('success');
                        //console.log(data);
                        if(data == true){
                            window.location.href="{{url('admin/appointment')}}";
                        }
                    },
                    error:function(data){
                        console.log('error');
                        console.log(data.responseText);    
                    }
                });
            }
        })

    </script>
@endsection
