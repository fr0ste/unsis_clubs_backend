<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attendance;


class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Attendance::factory()->count(5)->create();
        $clubId = 1;
        $fechas = ['enero', 'febreo1'];


        foreach ($fechas as $fecha) {
            DB::table('attendances')->insert(['
            ClubID' => $clubId,
            'AttendanceDate' => $fecha,
            ]);
        }      
    }
}

