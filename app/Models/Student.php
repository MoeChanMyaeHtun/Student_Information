<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\CurrentSemester;
use App\Enums\StudentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'student';

    protected $fillable = [
        'student_id',
        'student_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'enrollment_date',
        'department_id',
        'current_semester',
        'status',
        'photo_url',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'current_semester' => CurrentSemester::class,
        'status' => StudentStatus::class,
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
