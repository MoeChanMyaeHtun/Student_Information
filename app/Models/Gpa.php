<?php

namespace App\Models;

use App\Enums\CurrentSemester;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpa extends Model
{
    use HasFactory;

    protected $table = 'gpa';

    protected $primaryKey = 'gpa_id';

    protected $fillable = [
        'gpa_id',
        'student_id',
        'semester',
        'gpa',
    ];

    protected $casrs = [
        'semester' => CurrentSemester::class
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
