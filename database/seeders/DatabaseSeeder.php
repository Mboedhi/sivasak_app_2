<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin_Test',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin1111'),
            'role' => 'admin',
            'phone_number' => '2321',
            'vehicle_type' => "car"
        ]);

        $this->call(VehicleSeeder::class);
    }
}
