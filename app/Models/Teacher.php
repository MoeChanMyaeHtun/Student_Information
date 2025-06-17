<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';

    protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'teacher_id',
        'teacher_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];
}
