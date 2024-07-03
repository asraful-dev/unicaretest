<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OurService;
class ServiceDetail extends Model
{
    protected $fillable = [
        'our_service_id',
        'subject',
        'total_class',
        'exam_test',
        'count',
    ];

    public function ourService()
    {
        return $this->belongsTo(OurService::class);
    }

    
}
