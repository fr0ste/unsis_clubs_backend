<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AgendaClub;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgendaClub>
 */
class AgendaClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = AgendaClub::class;
    public function definition()
    {
        return [
            //
            'ClubID' => $this->faker->numberBetween(1, 5), 
            'ScheduleID' => $this->faker->numberBetween(1, 10),
            'DayID' => $this->faker->numberBetween(1, 5), 
       
        ];
    }
}
