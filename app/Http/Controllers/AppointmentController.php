<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    public function index()
    {
        //  $appointments = Appointment::all();
        //  $appointments =  DB::table('doctors')
        //  ->join('appointments', 'appointments.appointment_doctorID', '=', 'doctors.id')
        //  ->select('*')
        //  ->get();

        //  $appointments =  DB::table('appointments')
        //  ->join('doctors', 'doctors.id', '=', 'appointments.appointment_doctorID')
        //  ->select('*')
        //  ->get();
        $appointments = DB::table('doctors')
            ->join('appointments', 'appointments.appointment_doctorID', '=', 'doctors.id')
            ->select('*')
            ->get();


        // dd($appointments);die();

        return view('appointments.appointment', ['appointments' => $appointments]);
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('appointments.addappointment', ['doctors' => $doctors]);
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $appointment_doctorID = $request->appointment_doctorID;
            $appointment_date = $request->appointment_date;

            $appointment_timeForm = $request->appointment_timeForm;
            $appointment_timeTo = $request->appointment_timeTo;

            $appointment = Appointment::where('appointment_doctorID', $appointment_doctorID)
                ->where('appointment_date', $appointment_date)
                ->wherebetween('appointment_timeForm', [$appointment_timeForm, $appointment_timeTo])
                ->first();

            if ($appointment) {
                return redirect()->to('/appointment/create')->with('message', 'Appointment time is not available for this date...');
            } else {
                $appointment = new Appointment;
                $appointment->appointment_doctorID = $request->input('appointment_doctorID');
                $appointment->appointment_date = $request->input('appointment_date');
                $appointment->appointment_timeTo = $request->input('appointment_timeTo');
                $appointment->appointment_timeForm = $request->input('appointment_timeForm');
                $appointment->save();
            }

            Session::flash('message', 'Appointment Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.appointment');
        }
    }


    public function edit($id)
    {
        $appointments = Appointment::where('id', $id)->first();
        $doctors = Doctor::all();

        return view('appointments.updateappointment', ['appointments' => $appointments, 'doctors' => $doctors, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::where('id', $id)->first();

        if ($request->method() == 'POST') {

            $appointment_doctorID = $request->appointment_doctorID;
            $appointment_date = $request->appointment_date;

            $appointment_timeForm = $request->appointment_timeForm;
            $appointment_timeTo = $request->appointment_timeTo;

            $appointment = Appointment::where('id', $id)->first();
            $appointment->appointment_doctorID = $request->input('appointment_doctorID');
            $appointment->appointment_date = $request->input('appointment_date');
            $appointment->appointment_timeTo = $request->input('appointment_timeTo');
            $appointment->appointment_timeForm = $request->input('appointment_timeForm');
            $appointment->update();

            /*$appointment = Appointment::where('appointment_doctorID', $appointment_doctorID)
                ->where('appointment_date', $appointment_date)
                ->where('id', $id)
                ->wherebetween('appointment_timeForm', [$appointment_timeForm, $appointment_timeTo])
                ->first();

            if ($appointment) {
                return redirect()->to('/admin/appointment/edit/' . $id)->with('message', 'Appointment time is not available for this date...');
            } else {
                $appointment = Appointment::where('id', $id)->first();
                $appointment->appointment_doctorID = $request->input('appointment_doctorID');
                $appointment->appointment_date = $request->input('appointment_date');
                $appointment->appointment_timeTo = $request->input('appointment_timeTo');
                $appointment->appointment_timeForm = $request->input('appointment_timeForm');
                $appointment->update();
            }*/


            Session::flash('message', 'Appointment Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.appointment', $id);
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Appointment::where('id', $request->apmt_id)->delete();
            return true;
        }
    }


    public function appointmentview(Request $request, $id)
    {
        $doctors = Doctor::all();
        return view('appointments.editappointment', ['doctors' => $doctors]);
    }
}
