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
                'department_id' => 'D001',
                'department_name' => 'Computer Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D002',
                'department_name' => 'Information Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D003',
                'department_name' => 'Software Engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D004',
                'department_name' => 'Data Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D005',
                'department_name' => 'Cyber Security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D006',
                'department_name' => 'Information Systems',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D007',
                'department_name' => 'Network Engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D008',
                'department_name' => 'Artificial Intelligence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D009',
                'department_name' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D010',
                'department_name' => 'Mobile App Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
