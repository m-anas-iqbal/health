<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    

    public function doctortype()
    {
        return $this->hasMany(DoctorType::class);
    }

    public function specialty()
    {
        return $this->hasMany(Specialty::class);
    }

    public function hospital()
    {
        return $this->hasMany(Hospital::class);
    }

    public function courseform()
    {
        return $this->hasMany(CourseForm::class);
    }


    protected $fillable = [
        'doctor_fullname',
        'doctor_fees',
        'doctor_martialStatus',
        'doctor_dob',
        'doctor_gender',
        'doctor_degree',
        'doctor_details',
        'doctor_address',
        'doctor_experience',
        'email',
        'password',
        'doctor_phone',
        'doctor_PMDC',
        'doctor_country',
        'doctor_city',
        'doctor_state',
        'doctor_status',
        'doctor_hospital_id',
        'doctor_specialty_id',
        'doctor_course_id',
        'doctor_doctorType_id',
        'doctor_profileImage',
        'doctor_rating',
    ];

    protected $hidden = [
        'doctor_password',
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
