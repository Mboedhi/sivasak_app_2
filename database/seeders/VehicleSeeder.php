<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'user_id' => 1,
                'vehicle_plate' => 'B 1234 ABC',
                'year' => 2010,
                'vehicle_type' => 'car',
                'vehicle_registration' => '1234567890',
                'vehicle_tax' => '2021-01-01',
                'registration_expired'=> '2021-01-01',
                'head_cover_date' => '2021-01-01',
                'tail_cover_date' => '2021-01-01',
                'note' => 'Lorem ipsum dolor sit amet',
            ]
        ];

        foreach ($vehicles as $vehicle) {
            \App\Models\Vehicle::create($vehicle);
        }
    }
}
