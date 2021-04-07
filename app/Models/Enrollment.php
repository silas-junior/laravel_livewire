<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'student_id',
    ];

    public function courses()
    {
        $this->belongsTo(Course::class);
    }

    public function students()
    {
        $this->belongsTo(Student::class);
    }
}
