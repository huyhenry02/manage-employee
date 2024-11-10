<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use function Symfony\Component\String\b;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/users.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            User::create([

                'email' => $item->email,
                'code' => $item->code,
                'password' => bcrypt($item->password),
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
                'dob' => $item->dob,
                'gender' => $item->gender,
                'contact_info' => $item->contact_info,
                'address' => $item->address,
                'date_joined' => $item->date_joined,
                'status' => $item->status,
                'role_type' => $item->role_type,
                'position_id' => $item->position_id,
                'department_id' => $item->department_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
