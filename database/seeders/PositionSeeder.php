<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/positions.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Position::create([
                'position_title' => $item->position_title,
                'description' => $item->description,
                'base_salary' => $item->base_salary,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
