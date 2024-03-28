<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    use HasFactory, Notifiable;
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    protected $fillable = [
        'hospital_name', 
        'hospital_address', 
        'hospital_phone', 
        //'password',
        //'role',
        'hospital_city', 
        'hospital_zip', 
        'hospital_province', 
        'hospital_emergencyServices', 
        'hospital_em_value1', 
        'hospital_em_value2', 
        'hospital_em_value3'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}


