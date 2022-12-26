<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 	id	artist_Name	image	gerne	shortDesc	amount	date	venue
        return [
            'artist_Name' => $this->faker->sentence(),
            'image' => $this->faker->sentence(),
            'gerne' => $this->faker->sentence(),
            'shortDesc' => $this->faker->sentence(),
            'amount' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'venue' => $this->faker->sentence(),
        ];
    }
}