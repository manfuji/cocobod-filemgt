<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'first_appointment',
        'present_appointment',
        'review_from',
        'review_to',
        'reviewer',
        'job_title',
        'ap_date',
        'document'
    ];
}
