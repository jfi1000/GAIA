<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Operation;
class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
                            'name',
                            'firstname',
                            'lastname',
                            'RFC',
                            'email',
                            'movil',
                            'razon_social',
                            'type',
                        ];

    public function operations()
    {
        return $this->hasMany(Operation::class,'id_client');
    }                    
}
