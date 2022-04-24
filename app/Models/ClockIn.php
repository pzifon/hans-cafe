<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClockIn extends Model
{
    use HasFactory;
    protected $table = 'clockIn';
    protected $fillable = [
        'id',
        'emp_id',
        'date',
        'clock_in_time',
        'clock_out_time'
    ];
}