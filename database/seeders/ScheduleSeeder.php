<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
        //Schedule::factory()->count(5)->create();

    // Puedes cambiar estos horarios según tus necesidades
    $horarios = [
        ['02:00', '03:00'],
        ['18:00', '19:00'],
        ['19:30', '20:30'],
        // ... más horarios
    ];

    foreach ($horarios as $horario) {
        DB::table('schedules')->insert([
            'StartTime' => $horario[0],
            'EndTime' => $horario[1],
        ]);
        }
    }
}
