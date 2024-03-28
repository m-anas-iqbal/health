<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakeemType extends Model
{
    use HasFactory;
    public function hakeem()
    {
        return $this->hasOne(Hakeem::class);
    }

    protected $fillable = ['hakeemType_name'];
}
