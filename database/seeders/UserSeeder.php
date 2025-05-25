<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'), // Fixed password for admin
            'role' => 'admin', // Role for admin
        ]);

        // Optional: Create a doctor
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@example.com',
            'password' => bcrypt('doctorpassword'), // Fixed password for doctor
            'role' => 'doctor', // Role for doctor
        ]);
    }
}
