<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminConferenceManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
            'description',
            'lecturers',
            'date',
            'time',
            'address'
    ];
}
