<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890',
                'joining_date' => '2024-01-01',
                'gender' => 'Male',
                'department_id' => 1, // Assuming Human Resources
                'designation_id' => 1, // Assuming Manager
                'password' => Hash::make('password123'),
                'about' => 'Experienced HR manager.',
                'status' => 'Active',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'janesmith@example.com',
                'phone' => '0987654321',
                'joining_date' => '2024-02-01',
                'gender' => 'Female',
                'department_id' => 3, // Assuming IT
                'designation_id' => 3, // Assuming Developer
                'password' => Hash::make('password123'),
                'about' => 'Skilled full-stack developer.',
                'status' => 'Active',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
