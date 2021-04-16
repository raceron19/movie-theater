<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $theater = ['A1','A2','B1','B2'];
        return [
            'date' => $this->faker->dateTimeBetween('tomorrow', '+5 days'),
            'theater_hall' => $theater[array_rand($theater)],
            'capacity' => $this->faker->numberBetween(1,999),
        ];
    }
}
