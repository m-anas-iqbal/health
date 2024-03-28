<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pharmacy extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pharmacies';

   


    protected $fillable = [
        'Pharmacy_fullname',
        'Pharmacy_fees',
        'Pharmacy_martialStatus',
        'Pharmacy_dob',
        'Pharmacy_gender',
        'Pharmacy_degree',
        'Pharmacy_details',
        'Pharmacy_address',
        'Pharmacy_experience',
        'email',
        'password',
        'Pharmacy_phone',
        'Pharmacy_PMDC',
        'Pharmacy_country',
        'Pharmacy_city',
        'Pharmacy_state',
        'Pharmacy_status',
        'Pharmacy_hospital_id',
        
        'Pharmacy_course_id',
        'Pharmacy_PharmacyType_id',
        'Pharmacy_profileImage',
        'Pharmacy_rating',
    ];

    protected $hidden = [
        'Pharmacy_password',
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
