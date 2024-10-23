<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Area;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Fetch all areas IDs
        $areaIds = Area::pluck('id')->toArray();

        //Get role IDs
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        User::create([
            'name' => 'Puspa Parajuli',
            'email' => 'admin@gmail.com',
            'phone' => '9812345678',
            'address' => 'Kathmandu',
            'password' => Hash::make('password'), //Hash the password
            'role_id' => $adminRole->id,
            'area_id' => $areaIds[array_rand($areaIds)], // Assign a random area_id

        ]);

        //Create additional random users
        User::factory()->count(10)->state([
            'role_id' => $userRole->id,
            'area_id' => function () use ($areaIds) {
                return $areaIds[array_rand($areaIds)];

            },
        ])->create();
    }
}
