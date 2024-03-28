<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hakeem extends Authenticatable
{
    use HasFactory, Notifiable;

    

    public function hakeemtype()
    {
        return $this->hasMany(HakeemType::class);
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
        'hakeem_fullname',
        'hakeem_fees',
        'hakeem_martialStatus',
        'hakeem_dob',
        'hakeem_gender',
        'hakeem_degree',
        'hakeem_details',
        'hakeem_address',
        'hakeem_experience',
        'email',
        'password',
        'hakeem_phone',
        'hakeem_PMDC',
        'hakeem_country',
        'hakeem_city',
        'hakeem_state',
        'hakeem_status',
        'hakeem_hospital_id',
        
        'hakeem_course_id',
        'hakeem_hakeemType_id',
        'hakeem_profileImage',
        'hakeem_rating',
    ];

    protected $hidden = [
        'hakeem_password',
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
