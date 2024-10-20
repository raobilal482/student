<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserManagement extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = ['id'];
}
