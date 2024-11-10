<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/departments.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Department::create([
                'department_name' => $item->department_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
