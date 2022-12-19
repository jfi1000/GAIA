<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Operation;
use App\Models\ResiduoStatus;

class operation_status extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'operation_statuses';

    protected $fillable = [
        'status_id',
        'operation_id',
        'user_id',
    ];
    public function status()
    {
        return $this->hasOne(ResiduoStatus::class,'id','status_id'); 
    }                    
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id'); 
    }                    
    public function operations()
    {
        return $this->belongsTo(Operation::class,'operation_id');
    }                    

}
