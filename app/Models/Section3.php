<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section3 extends Model
{
    use HasFactory;
    protected $fillable = ['image1','image2','heading','description','btntext','btnlink'];

}
