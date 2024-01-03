<?php

namespace Database\Factories;

use App\Models\AttendanceStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceStatusFactory extends Factory
{
    protected $model = AttendanceStatus::class;    
    public function definition()
    {
        return [
            //
            'AttendanceStatus' => $this->faker->word, // Puedes ajustar esto según tus necesidades
        ];
    }
}
