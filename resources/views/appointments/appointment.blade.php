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
                        <h4>All Appointment</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Appointments</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div id="del_Appointment" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Appointment List </h4>
                                    <a href="{{ route('admin.appointmentcreate') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />



    <script type="application/javascript">
        $(function() {
            $('#calendar').fullCalendar({
                theme: true,
                customButtons: {
                    reload: {
                        text: 'Reload',
                        click: function() {
                            //you code
                        }
                    }
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,listMonth'
                },
                // firstDay: 3,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php
                    foreach ($appointments as $appointment) {
                        $appointment_timeForm =  $appointment->appointment_timeForm;
                        $appointment_timeFormFormat = date('g:i a', strtotime($appointment_timeForm));
                        $appointment_timeTo =  $appointment->appointment_timeTo;
                        $appointment_timeToFormat = date('g:i a', strtotime($appointment_timeTo));

                        echo '{';
                        echo "title: '" . $appointment_timeFormFormat . " - ". $appointment_timeToFormat . "', ";
                        echo "start: '" . $appointment->appointment_date . "', ";
                        echo "end: '" . $appointment->appointment_date . "', ";
                    
                        echo "url:'" . route('admin.appointmentedit',$appointment->id) . "', ";
                        echo "color  : '#dc3545',";
                        echo "textColor: '#FFF',";
                        echo '},';
                    }
                    ?>
                ]
            });
        });
    </script>
    
@endsection
