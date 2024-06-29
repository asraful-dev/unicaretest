<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\MoreService;
use App\Models\ExtraFacility;
use App\Models\ServiceDetail;

class OurService extends Model
{
    protected $guarded = [];

    public function extraFacilities()
    {
        return $this->hasMany(ExtraFacility::class);
    }
    
    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class);
    }
   

    

}
