<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run(): void
    {
       // Seed areas with default values
       Area::create([
        'local_unit' => 'Kathmandu',
        'ward_no' => '9',
        'address' => 'Gothatar',
    ]);

    Area::create([
        'local_unit' => 'Kathmandu',
        'ward_no' => '10',
        'address' => 'Pipalbot',
    ]);

    Area::create([
        'local_unit' => 'Kathmandu',
        'ward_no' => '4',
        'address' => 'Kadhaghari',
    ]);

    // Add more areas as needed
    }
}
