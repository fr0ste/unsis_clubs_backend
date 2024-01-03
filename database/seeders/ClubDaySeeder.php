<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClubDay;


class ClubDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        ClubDay::factory()->count(7)->create();
    }
}
