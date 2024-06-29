<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $guarded = [];

    function batchClass(){
        return $this->belongsTo(UClass::class, 'class_id', 'id');
    }

}
