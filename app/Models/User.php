<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $appends = [
        'birth_date_formated'
    ];

    protected $dates = [
        'birth_date'
    ];

    protected $fillable = [
        'name',
        'email',
        'birth_date',
    ];

    public function getBirthDateFormatedAttribute()
    {
        return $this->birth_date->format('d/m/Y');
    }

    public function student()
    {
        $this->hasOne(Student::class);
    }

    public function teacher()
    {
        $this->hasOne(Teacher::class);
    }
}
