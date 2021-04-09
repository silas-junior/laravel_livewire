<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $dates = [
        'enrollment_date'
    ];

    protected $fillable = [
        'course_id',
        'student_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
