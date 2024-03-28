<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [

        'appointment_doctorID',
        'appointment_date',
        'appointment_timeTo',
        'appointment_timeForm',
        'appointment_number',
        'appointment_status',

    ];
}
