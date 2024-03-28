<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Patient extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'frontpatient';

    protected $fillable = [
        'patient_fullname',
        'patient_martialStatus',
        'patient_dob',
        'patient_gender',
        'patient_weight',
        'patient_height_Feet',
        'patient_height_Inches',
        'patient_bloodGroup',
        'email',
        'patient_password',
        'password',
        'patient_phone',
        'patient_address',
        'patient_country',
        'patient_city',
        'patient_state',
        'patient_status',
        'patient_profileImage',
        'patient_InheritedDesease',
    ];
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

