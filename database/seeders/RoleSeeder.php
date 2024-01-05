<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Role::factory()->count(3)->create();
        $keywords = ['Administrador', 'Encargado', 'Alumno'
        ];

        foreach ($keywords as $keyword) {
            DB::table('roles')->insert([
                'RoleName' => $keyword,
            ]);
        }
    }
}

