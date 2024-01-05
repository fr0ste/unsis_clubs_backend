<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AttendanceStatus;


class AttendanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //AttendanceStatus::factory()->count(5)->create();
        $estados = [
            'si', 'no', 'Permiso' ];


        foreach ($estados as $estado) {
            DB::table('attendance_status')->insert([
                'AttendanceStatus' => $estado,
            ]);
        }
    }
}

