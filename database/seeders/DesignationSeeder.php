<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Team Lead', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analyst', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
