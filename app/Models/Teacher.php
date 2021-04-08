<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function course()
    {
        $this->belongsTo(Course::class);
    }
}
