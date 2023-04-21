<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id','title','document','date'
    ];
}
