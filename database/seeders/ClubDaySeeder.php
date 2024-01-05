<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClubDay;


class ClubDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //        ClubDay::factory()->count(7)->create();
        $keywords = [
            'Lunes', 'Martes', 'Miercoles', 'Jueves', 'viernes', 'Sabado'
        ];

        foreach ($keywords as $keyword) {
            DB::table('club_days')->insert([
                'DayName' => $keyword,
            ]);
    
        }
    }

}