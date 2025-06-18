<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student')->insert([
            [
                'student_id' => 'ST001',
                'student_name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'date_of_birth' => '2000-01-01',
                'gender' => 'Male',
                'address' => '123 Main St',
                'enrollment_date' => '2020-09-01',
                'department_id' => 1,
                'current_semester' => '2nd year 1st semester',
                'status' => 'Active',
                'photo_url' => 'https://example.com/photos/john.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'ST002',
                'student_name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '9876543210',
                'date_of_birth' => '1999-05-15',
                'gender' => 'Female',
                'address' => '456 Oak St',
                'enrollment_date' => '2019-09-01',
                'department_id' => 2,
                'current_semester' => '3rd year 2nd semester',
                'status' => 'Active',
                'photo_url' => 'https://example.com/photos/jane.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'ST003',
                'student_name' => 'Alex Johnson',
                'email' => 'alex@example.com',
                'phone' => '5555555555',
                'date_of_birth' => '2001-03-22',
                'gender' => 'Other',
                'address' => '789 Pine St',
                'enrollment_date' => '2021-09-01',
                'department_id' => 3,
                'current_semester' => '1st year 2nd semester',
                'status' => 'On Leave',
                'photo_url' => 'https://example.com/photos/alex.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'ST004',
                'student_name' => 'Emma Watson',
                'email' => 'emma@example.com',
                'phone' => '4444444444',
                'date_of_birth' => '1998-07-30',
                'gender' => 'Female',
                'address' => '101 Maple St',
                'enrollment_date' => '2018-09-01',
                'department_id' => 1,
                'current_semester' => '1st year 2nd semester',
                'status' => 'Graduated',
                'photo_url' => 'https://example.com/photos/emma.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 'ST005',
                'student_name' => 'Liam Brown',
                'email' => 'liam@example.com',
                'phone' => '3333333333',
                'date_of_birth' => '2002-11-10',
                'gender' => 'Male',
                'address' => '202 Elm St',
                'enrollment_date' => '2022-09-01',
                'department_id' => 2,
                'current_semester' => '1st year 1st semester',
                'status' => 'Suspended',
                'photo_url' => 'https://example.com/photos/liam.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
