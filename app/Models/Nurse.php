<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    public function hospital()
    {
        return $this->hasOne(Hospital::class);
    }


    protected $fillable = ['nurse_name', 'nurse_gender', 'nurse_address', 'nurse_phone', 'nurse_hospitalID'];
}
