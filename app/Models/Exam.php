<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function completed_by_user($userId)
{
    return UserAnswer::where('user_id', $userId)
                     ->where('exam_id', $this->id)
                     ->exists();
}

}

