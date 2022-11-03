<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Client;
use App\Models\ResiduoTipo;

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
        return $this->belongsTo(Client::class,'id');
    }                    
    public function residuo_tipo()
    {
        return $this->belongsTo(ResiduoTipo::class,'id');
    }                    

}