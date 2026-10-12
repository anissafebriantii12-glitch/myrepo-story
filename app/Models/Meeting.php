<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'meeting_type',
        'meeting_date',
        'title',
        'start_time',
        'end_time',
        'organizer',
        'status',
        'description'
    ];
}
