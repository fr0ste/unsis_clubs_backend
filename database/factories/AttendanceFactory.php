<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Attendance::class;
    public function definition()
    {
        return [
            'ClubID' => $this->faker->numberBetween(1, 10),
            'AttendanceDate' => $this->faker->date,
            'AttendanceStatus' => $this->faker->numberBetween(1, 3),
        ];
    }
}