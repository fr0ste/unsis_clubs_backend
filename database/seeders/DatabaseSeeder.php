<?php

use Database\Seeders\AgendaClubSeeder;
use Database\Seeders\ClubSeeder;
use Database\Seeders\ClubDaySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ScheduleSeeder;
use Database\Seeders\AttendanceStatusSeeder;
use Database\Seeders\AttendanceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            ClubSeeder::class,
            AgendaClubSeeder::class,
            AttendanceStatusSeeder::class,
            ClubSeeder::class,
            ClubDaySeeder::class,
            RoleSeeder::class,
            ScheduleSeeder::class,
           // AttendanceSeeder::class,

        ]);
    }
}

