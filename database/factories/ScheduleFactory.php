<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Schedule;


class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;
    public function definition()
    {
        return [
            //
            'StartTime' => $this->faker->time(),
            'EndTime' => $this->faker->time(),
        ];
    }
}
