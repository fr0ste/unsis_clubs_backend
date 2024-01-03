<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AgendaClub;


class AgendaClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AgendaClub::factory()->count(5)->create(); 
        /*Cuando intento ejecutar el seeder para probar que esten los datos me sale un error conla clase 
        factory que se definio en el model */
    }
}
