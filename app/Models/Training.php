<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'employee_id','title','document','date'
    ];
    use HasFactory;
}
