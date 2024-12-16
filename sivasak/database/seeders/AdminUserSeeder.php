<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create(attributes: [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin0000'),
            'role' => 'admin',
            'phone_number' => '38422',
            'vehicle_type' => 'cat'
        ]);
    }
}
