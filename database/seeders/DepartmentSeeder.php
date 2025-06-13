<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            [
                'department_name' => 'Computer Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Information Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Software Engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Data Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Cyber Security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Information Systems',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Network Engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Artificial Intelligence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Mobile App Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
