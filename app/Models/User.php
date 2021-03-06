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

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getBirthDateFormatedAttribute()
    {
        return $this->birth_date->format('d/m/Y');
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
