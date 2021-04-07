<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'email',
      'birth_date',
    ];

    public function enrollments()
    {
        $this->hasMany(Enrollment::class);
    }
}
