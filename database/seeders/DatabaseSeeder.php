<?php

use Database\Seeders\ClubSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(ClubSeeder::class);

           /* AgendaClubSeeder::class,
            AttendanceSeeder::class,
            AttendanceStatusSeeder::class,            
            ClubSeeder::class,
            ClubDaySeeder::class,
            RoleSeeder::class,
            ScheduleSeeder::class,

        );*/
    }
}
