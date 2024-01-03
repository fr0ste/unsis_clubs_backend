<?php

namespace Database\Factories;

use App\Models\ClubDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubDayFactory extends Factory
{
        protected $model = ClubDay::class;
        public function definition()
    {
        return [
            //
            'DayName' => $this->faker->dayOfWeek, // Genera nombres de días de la semana aleatorios
        ];
    }
}
