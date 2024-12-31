<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        $checkIn = $this->faker->dateTimeBetween('-1 month', 'now');
        $checkOut = (clone $checkIn)->modify('+'.random_int(1, 8).' hours');

        return [
            'user_id' => User::factory(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
        ];
    }
}
