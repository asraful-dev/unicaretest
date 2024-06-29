<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UClass extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function unit(){
        return $this->belongsTo(OurService::class);
    }

    public function subject(){
        return $this->belongsTo(ServiceDetail::class);
    }
}
