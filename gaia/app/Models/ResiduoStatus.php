<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResiduoStatus extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'residuo_status';
    protected $fillable = [
        'status', 
        'status_type',
    ];
    
    public function operations_status()
    {
        return $this->BelongsToMany(operation_status::class,'id');
    }                    


}
