<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OurService;

class Facility extends Model
{
     use HasFactory;
    protected $guarded = [];
    
    public function OurService()
    {
        return $this->belongsTo(OurService::class);
    }

   
}
