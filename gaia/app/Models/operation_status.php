<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class operation_status extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'status_id',
        'operation_id',
        'user_id',
    ];

}
