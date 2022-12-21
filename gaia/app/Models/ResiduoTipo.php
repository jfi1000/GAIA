<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Operation;

class ResiduoTipo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'residuo_tipos';
    protected $fillable = [
        'type',
        'description',
    ];

    //uno a muchos
    public function operations()
    {
        return $this->hasMany(Operation::class,'id');
    }                    

}