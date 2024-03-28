<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseForm extends Model
{
    use HasFactory;
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    protected $fillable = ['course_name'];
}
