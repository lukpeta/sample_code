<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text( 150),
            'content' => $this->faker->realText,
            'is_enable' => $this->faker->boolean(50),
            'visibility_date_from' => $this->faker->dateTimeBetween('-3 months', '+6 months'),
            'visibility_date_to' => $this->faker->dateTimeBetween('+3 months', '+6 months'),
        ];
    }
}
