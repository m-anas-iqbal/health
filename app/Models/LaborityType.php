<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborityType extends Model
{
    use HasFactory;
    public function labority()
    {
        return $this->hasOne(Labority::class);
    }

    protected $fillable = ['laborityType_name'];
}
