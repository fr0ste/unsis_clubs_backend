<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AgendaClub;


class AgendaClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //AgendaClub::factory()->count(5)->create();
        /*Cuando intento ejecutar el seeder para probar que esten los datos me sale un error conla clase 
        factory que se definio en el model */
/*
        $arrays = range(0, 5);
        foreach ($arrays as $valor) {
            DB::table('agendaClubs')->insert([
                'ClubID' => Str::random(10),
                'ScheduleID' => Str::random(10),
                'DayID' => Str::random(10),


            ]);
    }*/
    //hola haciendo nuevo pull requets
}
}
