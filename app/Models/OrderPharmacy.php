<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderPharmacy extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'pharmacy_fullname',
        'pharmacy_id',
        'speciality_id',
        'patient_id',
        'fees',
        'day',
        'ibft_no',
        'ibft_image',
        'comments',
    ];

    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

}
