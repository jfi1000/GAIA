<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Client;
use App\Models\ResiduoTipo;
use App\Models\operation_status;

class Operation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'weight',
        'date_operation',
        'id_client',
        'id_residuo',
        'qr',
    ];
    //uno a muchos (inversa)
    public function client()
    {
        return $this->belongsTo(Client::class,'id_client');
    }                    
    public function residuo_tipo()
    {
        return $this->belongsTo(ResiduoTipo::class,'id_residuo');
    }                    
    public function operation_status()
    {
        return $this->hasMany(operation_status::class,'operation_id','id'); 
        // return $this->hasManyThrough(
        //     ResiduoStatus::class,
        //     User::class,
        //     'operation_id',
        //     'user_id',
        //     'id'
        // );

    }
}