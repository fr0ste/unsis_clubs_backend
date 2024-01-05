<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios con roles existentes
        User::factory()->create([
            'Username' => 'admin',
            'Email' => 'admin@example.com',
            'RoleID' => Role::where('RoleName', 'ROLE_ADMIN')->first()->RoleID,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'Username' => 'careerHead',
            'Email' => 'careerHead@example.com',
            'RoleID' => Role::where('RoleName', 'ROLE_CAREER_HEAD')->first()->RoleID,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'Username' => 'clubLeader',
            'Email' => 'clubLeader@example.com',
            'RoleID' => Role::where('RoleName', 'ROLE_CLUB_LEADER')->first()->RoleID,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'Username' => 'student',
            'Email' => 'student@example.com',
            'RoleID' => Role::where('RoleName', 'ROLE_STUDENT')->first()->RoleID,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
