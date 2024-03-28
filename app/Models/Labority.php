<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Labority extends Authenticatable
{
    use HasFactory, Notifiable;

    

    public function laboritytype()
    {
        return $this->hasMany(laborityType::class);
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
        'labority_fullname',
        'labority_fees',
        'labority_martialStatus',
        'labority_dob',
        'labority_gender',
        'labority_degree',
        'labority_details',
        'labority_address',
        'labority_experience',
        'email',
        'password',
        'labority_phone',
        'labority_PMDC',
        'labority_country',
        'labority_city',
        'labority_state',
        'labority_status',
        'labority_hospital_id',
        
        'labority_course_id',
        'labority_laborityType_id',
        'labority_profileImage',
        'labority_rating',
    ];

    protected $hidden = [
        'labority_password',
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
