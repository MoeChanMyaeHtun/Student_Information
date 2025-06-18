<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    protected $fillable = [
        'department_name',
        'department_id'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'department_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class, 'id', 'department_id');
    }
}
