<?php

namespace App\Models;

use App\Enums\CurrentSemester;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $fillable = [
        'course_id',
        'course_name',
        'teacher_id',
        'department_id',
        'credits',
        'semester',
    ];
    protected $casts = [
        'semester' => CurrentSemester::class,
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }
}

