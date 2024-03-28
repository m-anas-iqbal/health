<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'content', 'price', 'author_id', 'auto_renew', 'email', 'token'];
}
