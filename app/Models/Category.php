<?php

namespace App\Models;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function banners()
{
    return $this->hasMany(Banner::class);
}
}
