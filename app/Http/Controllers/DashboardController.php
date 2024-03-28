<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
         $appointments = DB::table('doctors')
         ->join('appointments', 'appointments.appointment_doctorID', '=', 'doctors.id')
         ->select('*')
         ->get();
         return view('dashboard.admin.dashboard', ['appointments' => $appointments]);
    }
}
