<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/*
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; */

class ClubSeeder extends Seeder
{
    public function run()
    {
        //Insertar datos especificos
       /* DB::table('clubs')->insert([
            'ClubName' => 'Jhonatan',
            'Description' => 'Fernandez',
        ]);*/

       //Insertar datos randooms
        $keywords = ['Futbol', 'Voli', 'Basquet', 'Tae', 'Musica', 'GYM', 'Ajedrez'
        ];

        foreach ($keywords as $keyword) {
            DB::table('clubs')->insert([
                'ClubName' => $keyword,
                'Description' => 'Description for ' . $keyword,
            ]);
        }

        /*
        $arrays = range(0, 5);
        foreach ($arrays as $valor) {
            DB::table('clubs')->insert([
                'ClubName' => Str::random(10),
                'Description' => Str::random(10),
            ]);
        }*/

    }
}
