<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'weight',
        'date_operation',
        'id_status',
        'id_client',
        'id_residuo',
        'qr',
    ];

}